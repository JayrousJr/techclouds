<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicerequestRelationManager extends RelationManager
{
    protected static string $relationship = 'service_request';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Customer_Name')
                    ->maxLength(255)
                    ->required()
                    ->unique(ignoreRecord: true), Forms\Components\TextInput::make('Customer_Email')
                    ->maxLength(255)
                    ->required()
                    ->unique(ignoreRecord: true), Forms\Components\TextInput::make('Customer_Phone')
                    ->maxLength(255)
                    ->required()
                    ->unique(ignoreRecord: true), Forms\Components\TextInput::make('Service_Requested')
                    ->maxLength(255)
                    ->required()
                    ->unique(ignoreRecord: true),
                Forms\Components\MarkdownEditor::make('Short_Description')
                    ->required()
                    ->maxLength(1500),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('Customer_Name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Customer_Email')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Customer_Phone')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('Service_Requested')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ordered At')
                    ->dateTime('D M, d,  Y')->sortable(),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
