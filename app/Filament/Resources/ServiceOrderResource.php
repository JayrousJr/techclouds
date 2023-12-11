<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ServiceOrder;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Hidden;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ServiceOrderResource\Pages;
use App\Filament\Resources\ServiceOrderResource\RelationManagers;

class ServiceOrderResource extends Resource
{
    protected static ?string $model = ServiceOrder::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationGroup = 'Projects Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id')
                    ->label('Order ID')
                    ->options(function () {
                        // Retrieve a list of requests who are not made projects 
                        return DB::table('projects')
                            ->leftJoin('service_orders', 'projects.request_id', '=', 'service_orders.request_id')
                            ->select('projects.id', 'projects.project_client')
                            ->whereNull('service_orders.request_id')
                            ->get()
                            ->pluck('project_client', 'id');
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, Set $set) {
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
                        // $set('', $project->); 
                        // $set('', $project->);
                    }),
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

    public static function table(Table $table): Table
    {
        return $table
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
                Tables\Columns\ImageColumn::make('project_image')
                    ->label('Proj Image'),

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
            'index' => Pages\ListServiceOrders::route('/'),
            'create' => Pages\CreateServiceOrder::route('/create'),
            'view' => Pages\ViewServiceOrder::route('/{record}'),
            'edit' => Pages\EditServiceOrder::route('/{record}/edit'),
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
