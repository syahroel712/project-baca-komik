<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Chapter')
                    ->schema([

                        Hidden::make('chapter_id')
                            ->default(fn() => request()->query('chapter_id'))
                            ->required(),

                        FileUpload::make('image')
                            ->image()
                            ->disk('public')
                            ->directory('pages')
                            ->required(),

                        TextInput::make('order')
                            ->numeric()
                            ->default(1)
                            ->required(),

                        Toggle::make('is_active')
                            ->label('Publish')
                            ->default(true),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
