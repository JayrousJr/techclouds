<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Status;
use App\Models\Project;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\ServiceRequest;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Forms\Components\Select;
use Filament\Support\Enums\ActionSize;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-s-flag';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationGroup = 'Projects Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('request_id')
                    ->label('List of Requests by Names')
                    ->options(function () {
                        // Retrieve a list of requests who are not made projects 
                        return DB::table('service_requests')
                            ->leftJoin('projects', 'service_requests.id', '=', 'projects.request_id')
                            ->select('service_requests.id', 'service_requests.Customer_name')
                            ->whereNull('projects.request_id')
                            ->get()
                            ->pluck('Customer_name', 'id');
                    })
                    ->searchable()
                    ->required(fn (string $operation): bool => $operation === 'create')
                    ->preload()
                    ->reactive()
                    ->afterStateUpdated(function ($state, Set $set) {
                        if (blank($state)) return;

                        $request = ServiceRequest::find($state);

                        $set('project_client', $request->Customer_Name);
                        $set('Service_Requested', $request->Service_Requested);
                        $set('client_id', $request->client_id);

                        // setting a project name slug
                        $nameSlug = Str::slug($request->Service_Requested);
                        $set('project_class', $nameSlug);

                        //setting a project name
                        $projectname = $request->Service_Requested . '_Project_' . now()->format('dYHis');
                        $set('project_name', $projectname);
                    })
                    ->helperText('Please Select The user by the user names avalibale request to proceed'),
                Forms\Components\Hidden::make('client_id'),

                Forms\Components\TextInput::make('project_client')
                    ->helperText('This field is populated automatically')
                    ->readonly()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('project_name')
                    ->helperText('This field is populated automatically')
                    ->readonly()
                    ->required()
                    ->maxLength(250),
                Forms\Components\TextInput::make('Service_Requested')
                    ->helperText('This field is populated automatically')
                    ->readonly()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('project_class')
                    ->helperText('This field is populated automatically')
                    ->readonly()
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('status')
                    ->label('Project Status')
                    ->options(Status::all()->pluck('statuses', 'status_name'))
                    ->searchable()
                    ->required()
                    ->preload(),

                Forms\Components\Select::make('developer_name')
                    ->label('Project Developer')
                    ->options(User::whereIn('role', ['Manager', 'Administrator'])->whereIn('team_member', [1])->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, Set $set) {
                        if (blank($state)) return;
                        $user = User::find($state);

                        $set('developer_image', $user->profile_photo_path);
                        $set('developer_name', $user->name);
                    }),
                Forms\Components\Hidden::make('developer_name')
                    ->required(),
                Forms\Components\Hidden::make('developer_image')
                    ->required(),
                Forms\Components\DatePicker::make('date_to_start')
                    ->required(),
                Forms\Components\DatePicker::make('date_to_finish')
                    ->afterOrEqual('date_to_start')
                    ->required(),
                Select::make('project_role')
                    ->required()
                    ->preload()
                    ->searchable()
                    ->options(
                        [
                            'Developing the frontend only' => 'Developing the frontend only',
                            'Developing the backend only' => 'Developing the backend only',
                            'Developing the full functional system including frontend as well as backend' => 'Developing the full functional system including frontend as well as backend',
                            'Graphics designing of the given idea and prototype' => 'Graphics designing of the given idea and prototype',
                            'Designing the user interface and experience' => 'Designing the user interface and experience',
                            'Designing and creating video animation' => 'Designing and creating video animation',
                            'Monitoring and making testing to discover the vulnabilities in the given system' => 'Monitoring and making testing to discover the vulnabilities in the given system',
                        ]
                    ),
                MarkdownEditor::make('developer_comments')
                    ->required()
                    ->maxLength(255),
                // Forms\Components\FileUpload::make('developer_image')
                //     ->image()
                //     ->required(),
                Forms\Components\FileUpload::make('project_image')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $filename = $file->hashName();
                        $name = explode('.', $filename);
                        return (string) str('images/projects/' . $name[0] . '.png');
                    })
                    ->required()
                    ->imageEditor()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageResizeTargetWidth('800')
                    ->imageResizeTargetHeight('800')
                    ->label('Project Image'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('project_client')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Completed' => 'success',
                        'Pending' => 'warning',
                        'Canceled' => 'danger',
                        'On Going' => 'success',
                    }),
                Tables\Columns\TextColumn::make('developer_name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('developer_image'),
                Tables\Columns\TextColumn::make('Service_Requested')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Requested on')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
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
