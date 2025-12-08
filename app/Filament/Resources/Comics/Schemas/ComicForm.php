<?php

namespace App\Filament\Resources\Comics\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ComicForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Komik')
                    ->schema([
                        TextInput::make('title')
                            ->required(),

                        // TextInput::make('slug')
                        //     ->disabled()
                        //     ->dehydrated(false),

                        Textarea::make('description')
                            ->columnSpanFull(),

                        FileUpload::make('cover')
                            ->image()
                            ->disk('public')
                            ->directory('covers')
                            ->imagePreviewHeight('250')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Detail Tambahan')
                    ->schema([
                        TextInput::make('author'),

                        TextInput::make('rating')
                            ->label('Rating')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(5)
                            ->step(0.1),

                        Select::make('type')
                            ->label('Type')
                            ->options([
                                'manga' => 'Manga',
                                'manhwa' => 'Manhwa',
                                'manhua' => 'Manhua',
                                'series' => 'Series',
                                'oneshot' => 'One Shot',
                            ])
                            ->required(),

                        DatePicker::make('released_at'),

                        Select::make('status')
                            ->options([
                                'ongoing' => 'Ongoing',
                                'completed' => 'Completed',
                                'hiatus' => 'Hiatus',
                            ])
                            ->default('ongoing')
                            ->required(),

                        Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ])
                    ->columns(2),

                Section::make('Genre Komik')
                    ->schema([
                        Select::make('genres')
                            ->relationship('genres', 'name')
                            ->multiple()
                            ->required()
                            ->placeholder('Pilih genre...')
                            ->preload()
                            ->searchable(),
                    ])
                    ->columns(1),
            ]);
    }
}
