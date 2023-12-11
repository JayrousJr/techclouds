<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\ProjectClass;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectClassResource\Pages;
use App\Filament\Resources\ProjectClassResource\RelationManagers;
use App\Filament\Resources\ProjectclassResource\RelationManagers\OrdersRelationManager;

class ProjectClassResource extends Resource
{
    protected static ?string $model = ProjectClass::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-light-bulb';
    protected static ?int $navigationSort = 4;
    protected static ?string $navigationGroup = 'Projects Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('service_name')
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->maxLength(100)
                    ->reactive()
                    ->autofocus()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('service_class', Str::slug($state));
                        $nameParts = explode(' ',  trim($state));
                        $firstWord = array_shift($nameParts);
                        $secondWord = array_pop($nameParts);
                        $set('service_code', Str::substr($firstWord, 0, 1) . Str::substr($secondWord, 0, 1));
                    }),
                Forms\Components\TextInput::make('service_class')
                    ->maxLength(100)
                    ->readonly(),
                Toggle::make('is_active'),
                Forms\Components\TextInput::make('service_code')
                    ->maxLength(10)
                    ->readonly()
                    ->required()
                    ->helperText('Code will only use the first Two characters of first and last word')
                    ->dehydrateStateUsing(fn ($state) => Str::upper($state)),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_class')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Service Active')
                    ->sortable()
                    ->boolean(),
                Tables\Columns\TextColumn::make('service_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            OrdersRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProjectClasses::route('/'),
            'create' => Pages\CreateProjectClass::route('/create'),
            'view' => Pages\ViewProjectClass::route('/{record}'),
            'edit' => Pages\EditProjectClass::route('/{record}/edit'),
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
