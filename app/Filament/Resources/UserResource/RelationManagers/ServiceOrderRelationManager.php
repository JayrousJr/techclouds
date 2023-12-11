<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Resources\RelationManagers\RelationManager;

class ServiceOrderRelationManager extends RelationManager
{
    protected static string $relationship = 'service_order';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('id')
                    ->label('Order ID')
                    ->options(Project::all()->pluck('project_name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->unique()
                    ->reactive()
                    ->afterStateUpdated(function (Set $set, ?string $state) {
                        if (blank($state)) return;
                        $project = Project::find($state);

                        $set('service_name', $project->Service_Requested);
                        $set('project_class', $project->project_class);
                        $set('project_status', $project->status);
                        $set('project_name', $project->project_name);
                        $set('project_developer', $project->developer_name);
                        $set('developer_image', $project->developer_image);
                        $set('project_role', $project->project_role);
                        $set('date_to_start', $project->date_to_start);
                        $set('date_to_finish', $project->date_to_finish);
                        $set('Customer_Name', $project->project_client);
                        $set('Developer_Comments', $project->developer_comments);
                        $set('request_id', $project->request_id);
                        $set('client_id', $project->client_id);
                        $set('project_image', $project->project_image);
                    }),
                TextInput::make('Customer_Name')
                    ->label('Client Name'),
                TextInput::make('service_name')
                    ->label('Service'),
                TextInput::make('project_name')
                    ->label('Order Name'),
                TextInput::make('project_status'),
                TextInput::make('project_developer'),
                Hidden::make('client_id'),
                Hidden::make('request_id'),
                Hidden::make('project_class'),
                Hidden::make('developer_image'),
                Hidden::make('project_image'),
                DatePicker::make('date_to_start')
                    // ->dateTime('D M Y')
                    ->label('Starting Date'),
                DatePicker::make('date_to_finish')
                    ->label('Ending Date')
                // ->dateTime('D M Y')
                ,
                MarkdownEditor::make('project_role')
                    ->label('Developer Comments')

                    ->label('Project Role')
                    ->toolbarButtons([
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'edit',
                        'italic',
                        'link',
                        'orderedList',
                        'preview',
                        'strike',
                    ]),
                MarkdownEditor::make('Developer_Comments')
                    ->label('Developer Comments')

                    ->toolbarButtons([
                        'bold',
                        'bulletList',
                        'codeBlock',
                        'edit',
                        'italic',
                        'link',
                        'orderedList',
                        'preview',
                        'strike',
                    ]),
                Toggle::make('paid')
                    ->required()
                    ->label('Approved'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('Customer_Name'),
                Tables\Columns\TextColumn::make('service_name'),
                TextColumn::make('project_status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Pending' => 'warning',
                        'Canceled' => 'danger',
                        'On Going' => 'success',
                    }),
                Tables\Columns\TextColumn::make('date_to_start')
                    ->date(),
                Tables\Columns\TextColumn::make('date_to_finish')
                    ->date(),
                Tables\Columns\IconColumn::make('paid')
                    ->boolean(),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->headerActions([
                // Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
