<?php

namespace App\Filament\Resources\Comics\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ComicInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Komik')
                    ->schema([
                        ImageEntry::make('cover')
                            ->disk('public')
                            ->height(250),

                        TextEntry::make('title'),
                        TextEntry::make('description')->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Detail Tambahan')
                    ->schema([
                        TextEntry::make('author'),
                        TextEntry::make('released_at')->date(),
                        TextEntry::make('status')
                            ->badge()
                            ->formatStateUsing(fn($state) => ucfirst($state)),
                        IconEntry::make('is_active')->boolean(),
                    ])
                    ->columns(2),

                Section::make('Genre')
                    ->schema([
                        TextEntry::make('genres.name')
                            ->badge()
                            ->separator(', ')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }
}
