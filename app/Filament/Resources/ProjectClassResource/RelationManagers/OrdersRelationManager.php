<?php

namespace App\Filament\Resources\ProjectclassResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Hidden;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class OrdersRelationManager extends RelationManager
{
    protected static string $relationship = 'orders';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Customer_Name')
                    ->label('Client Name')

                    ->readonly(),
                Forms\Components\TextInput::make('service_name')
                    ->label('Service')
                    ->readonly(),
                Forms\Components\TextInput::make('project_name')
                    ->label('Order Name')
                    ->readonly(),
                Forms\Components\TextInput::make('project_status')

                    ->readonly(),
                Forms\Components\TextInput::make('project_developer')
                    ->readonly(),

                Hidden::make('client_id'),
                Hidden::make('request_id'),
                Hidden::make('project_class'),
                Hidden::make('developer_image'),
                Hidden::make('project_image'),
                Forms\Components\DatePicker::make('date_to_start')
                    ->readonly()
                    ->label('Starting Date'),
                Forms\Components\DatePicker::make('date_to_finish')
                    ->label('Ending Date')->readonly()
                    ->readonly(),
                Forms\Components\TextArea::make('project_role')
                    ->label('Developer Comments')
                    ->readonly()
                    ->label('Project Role'),
                Forms\Components\TextArea::make('Developer_Comments')
                    ->label('Developer Comments')
                    ->readonly(),
                Forms\Components\Toggle::make('paid')
                    ->required()
                    ->label('Approved'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('Customer_Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('service_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('project_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Pending' => 'warning',
                        'Canceled' => 'danger',
                        'On Going' => 'success',
                    }),
                Tables\Columns\TextColumn::make('project_developer')
                    ->searchable()
                    ->label('Dev name'),

                Tables\Columns\ImageColumn::make('developer_image')
                    ->label('Dev Image'),
                Tables\Columns\ImageColumn::make('project_image'),
                Tables\Columns\IconColumn::make('paid')
                    ->boolean(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Approved')
                    ->sortable()
                    ->since(),
                Tables\Columns\TextColumn::make('updated_at')
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
                    // Tables\Actions\EditAction::make(),
                    // Tables\Actions\DeleteAction::make(),
                ])
                    ->size(ActionSize::Small)
                    ->icon('heroicon-m-ellipsis-horizontal')
                    ->tooltip('Actions')
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
