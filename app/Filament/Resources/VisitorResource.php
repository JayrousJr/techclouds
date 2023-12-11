<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Visitor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VisitorResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VisitorResource\RelationManagers;
use App\Filament\Resources\VisitorResource\Widgets\VisitorWidget;

class VisitorResource extends Resource
{
    protected static ?string $navigationIcon = 'heroicon-o-eye';
    protected static ?string $navigationGroup = 'System Management';
    protected static ?string $model = Visitor::class;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id'),
                Forms\Components\TextInput::make('method'),
                Forms\Components\TextInput::make('request'),
                Forms\Components\TextInput::make('url'),
                Forms\Components\TextInput::make('referer'),
                Forms\Components\RichEditor::make('languages'),
                // Forms\Components\RichEditor::make('headers'),
                Forms\Components\RichEditor::make('useragent'),
                Forms\Components\TextInput::make('device'),
                Forms\Components\TextInput::make('platform'),
                Forms\Components\TextInput::make('browser'),
                Forms\Components\TextInput::make('ip')
                    ->label('IP address'),
                Forms\Components\TextInput::make('visitable_type'),
                Forms\Components\TextInput::make('visitable_id'),
                // Forms\Components\TextInput::make('visitor_type'),
                Forms\Components\TextInput::make('visitor_id'),
                Forms\Components\TextInput::make('created_at')
                    ->label('Visited At'),
                // Forms\Components\TextInput::make('updated_at'),
                // Forms\Components\TextInput::make(''),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Visited')
                    ->dateTime('D M d, Y')
                    ->since()
                    ->sortable(),
                Tables\Columns\TextColumn::make('device')
                    ->searchable(),
                Tables\Columns\TextColumn::make('platform')
                    ->searchable(),
                Tables\Columns\TextColumn::make('ip')
                    ->label('IP address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('browser')
                    ->searchable(),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVisitors::route('/'),
            'create' => Pages\CreateVisitor::route('/create'),
            'view' => Pages\ViewVisitor::route('/{record}'),
            'edit' => Pages\EditVisitor::route('/{record}/edit'),
        ];
    }
}
