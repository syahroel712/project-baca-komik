<?php

namespace App\Filament\Resources\Genres\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class GenreForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Informasi Genre')
                    ->description('Masukkan data genre untuk kategori komik.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Genre')
                            ->required(),

                        // TextInput::make('slug')
                        //     ->label('Slug')
                        //     ->required(),

                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->placeholder('Opsional')
                            ->columnSpanFull(),

                        Toggle::make('is_active')
                            ->label('Aktif?')
                            ->required(),
                    ])
                    ->columnSpanFull(),

            ]);
    }
}
