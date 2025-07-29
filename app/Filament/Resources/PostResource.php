<?php

namespace App\Filament\Resources;

use App\Models\Post;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use TangoDevIt\FilamentEmojiPicker\EmojiPickerAction;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Blog Management';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            // Asignación automática del usuario
            Forms\Components\Hidden::make('user_id')
            ->default(auth()->id())
            ->required(),

            Forms\Components\Select::make('category_id')
            ->label('Category')
            ->options(Category::all()->pluck('name', 'id'))
            ->searchable()
            ->required(),

            Forms\Components\TextInput::make('title')
            ->required()
            ->maxLength(255)
            ->suffixAction(EmojiPickerAction::make('emoji-title')),

            Forms\Components\RichEditor::make('content')
            ->required()
            ->columnSpanFull()
            ->fileAttachmentsDirectory('posts/content')
            ->fileAttachmentsVisibility('public')
            ->hintAction(EmojiPickerAction::make('emoji-messagge')),

            Forms\Components\FileUpload::make('image')
            ->image()
            ->directory('posts/featured')
            ->visibility('public')
            ->preserveFilenames()
            ->imageEditor()
            ->columnSpanFull()
                ->required(), // Opcional: si quieres que sea obligatorio

                Forms\Components\Toggle::make('is_published')
                ->live()
                ->afterStateUpdated(function ($state, Forms\Set $set) {
                    $set('published_at', $state ? now() : null);
                }),

                Forms\Components\DateTimePicker::make('published_at')
                ->native(false)
                ->displayFormat('d/m/Y H:i')
                ->disabled()
                ->dehydrated()
                ->hidden(fn (Forms\Get $get): bool => !$get('is_published')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),

                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'name'),

                Tables\Filters\Filter::make('published')
                    ->query(fn ($query) => $query->where('is_published', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Resources\PostResource\Pages\ListPosts::route('/'),
            'create' => \App\Filament\Resources\PostResource\Pages\CreatePost::route('/create'),
            'edit' => \App\Filament\Resources\PostResource\Pages\EditPost::route('/{record}/edit'),
        ];
    }
}