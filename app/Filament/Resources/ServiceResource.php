<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Service;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\ProjectClass;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ServiceResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceResource\RelationManagers;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-s-server';

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Service Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('token')
                    ->default(Str::random(64)),
                Select::make('service_name')
                    ->label('Service')
                    ->options(function () {
                        // Retrieve a list of requests who are not made projects 
                        return DB::table('project_classes')
                            ->leftJoin('services', 'project_classes.service_name', '=', 'services.service_name')
                            ->select('project_classes.service_name', 'project_classes.service_name')
                            ->whereNull('services.service_name')
                            ->get()
                            ->pluck('service_name', 'service_name');
                    })
                    ->searchable()
                    ->preload()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->reactive()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $nameParts = explode(' ', trim($state));
                        $firstWord = array_shift($nameParts);
                        $secondWord = array_pop($nameParts);
                        $set('service_code', Str::substr($firstWord, 0, 1) . Str::substr($secondWord, 0, 1));
                    }),
                Forms\Components\TextInput::make('service_code')
                    ->readonly()
                    ->required(),
                Select::make('service_provider')
                    ->label('Service Provider')
                    ->options(User::whereIn('role', ['Administrator', 'Manager'])->whereIn('team_member', [1])->pluck('name', 'name'))
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Textarea::make('service_description')
                    ->required()
                    ->label('Service Description'),
                Toggle::make('is_active'),
                Forms\Components\Markdowneditor::make('service_more')
                    ->required()
                    ->columnSpanFull()
                    ->label('Service Details')->maxLength(1500),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_provider')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_code')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Service Active')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TrashedFilter::make()
                    ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
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
