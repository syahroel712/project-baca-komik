<?php

namespace App\Filament\Resources\Chapters\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ChapterInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                //
                // 🟦 SECTION 1: Informasi Comic
                //
                Section::make('Informasi Comic')
                    ->schema([
                        TextEntry::make('comic_name')
                            ->label('Comic')
                            ->default(fn($record) => optional($record->comic)->title ?? '-')
                            ->disabled()
                            ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),

                //
                // 🟦 SECTION 2: Informasi Chapter
                //
                Section::make('Informasi Chapter')
                    ->schema([
                        TextEntry::make('title')
                            ->label('Judul Chapter')
                            ->disabled(),

                        TextEntry::make('number')
                            ->label('Nomor Chapter')
                            ->numeric()
                            ->disabled(),

                        TextEntry::make('released_at')
                            ->label('Tanggal Rilis')
                            ->date()
                            ->disabled(),

                        IconEntry::make('is_active')
                            ->label('Published')
                            ->boolean()
                            ->disabled(),
                    ])
                    ->columns(2),

                //
                // 🟦 SECTION 3: Metadata
                //
                Section::make('Metadata')
                    ->schema([
                        TextEntry::make('created_at')
                            ->label('Dibuat')
                            ->dateTime()
                            ->disabled(),

                        TextEntry::make('updated_at')
                            ->label('Diperbarui')
                            ->dateTime()
                            ->disabled(),
                    ])
                    ->columns(2),
            ]);
    }
}
