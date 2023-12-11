<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Role;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Set;
use App\Models\Language;
use Filament\Forms\Form;
use App\Models\Profession;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Filters\Filter;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\UserResource\RelationManagers\MessagesRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\ServiceOrderRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\ServicerequestRelationManager;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(20),
                Forms\Components\TextInput::make('nationality')
                    ->maxLength(50),
                Forms\Components\TextInput::make('city')
                    ->maxLength(50),
                Forms\Components\Select::make('profession')
                    ->searchable()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->hidden(!auth()->user()->isManager())
                    ->options(Profession::all()->pluck('rank', 'rank'))
                    ->preload(),
                Select::make('roles')
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->hidden()
                    ->searchable()
                    ->hidden(!auth()->user()->isManager())
                    ->relationship('roles', 'name')
                    ->preload()
                    ->reactive(),
                Select::make('role')
                    ->searchable()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->hidden(!auth()->user()->isManager())
                    ->helperText('This is the Role of a person in the system')
                    ->options(Role::all()->pluck('name', 'name'))
                    ->label('Role In the System'),
                Select::make('languages')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(Language::all()->pluck('language', 'language'))
                    ->label('Programming languages and Designing Softwares you Use'),
                Forms\Components\Toggle::make('team_member')
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        if (blank($state)) return;
                        $set('role', 'Technician');
                    })
                    ->hidden(!auth()->user()->isManager())
                    ->required(fn (string $operation): bool => $operation === 'create'),

                Forms\Components\FileUpload::make('profile_photo_path')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageEditor()
                    ->imageResizeTargetWidth('500')
                    ->imageResizeTargetHeight('500')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $fileName = $file->hashName();
                        $name = explode('.', $fileName);
                        return (string) str('profile-photos/' . $name[0] . '.png');
                    })->label('Profile Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_photo_path')
                    ->default('profile-photos/profile.jpg')
                    ->label('Image')
                    ->circular()
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('team_member')
                    ->label('Is in Administrative Team')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Joined Since')
                    ->dateTime()
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()->searchable(),
                SelectFilter::make('team_member')
                    ->label('Users')
                    ->searchable()
                    ->options([
                        '0' => 'Clients',
                        '1' => 'Administrative Members',
                    ]),

            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                    ->size(ActionSize::Small)
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->tooltip('Actions')
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ServicerequestRelationManager::class,
            ServiceOrderRelationManager::class,
            MessagesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
