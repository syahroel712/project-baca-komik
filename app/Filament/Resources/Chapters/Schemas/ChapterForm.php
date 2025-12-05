<?php

namespace App\Filament\Resources\Chapters\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ChapterForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Chapter')
                    ->schema([

                        // Hidden field untuk comic_id
                        Hidden::make('comic_id')
                            ->default(fn() => request()->query('comic_id'))
                            ->required(),

                        TextInput::make('comic_name')
                            ->label('Comic')
                            ->disabled()
                            ->afterStateHydrated(function ($component, $state, $record) {
                                // $record adalah Chapter yang sedang diedit
                                if ($record) {
                                    $component->state(optional($record->comic)->title);
                                } else {
                                    $comicId = request()->query('comic_id');
                                    if ($comicId) {
                                        $component->state(optional(\App\Models\Comic::find($comicId))->title);
                                    }
                                }
                            })
                            ->columnSpanFull(),

                        TextInput::make('title')
                            ->label('Judul Chapter')
                            ->required(),

                        TextInput::make('number')
                            ->label('Nomor Chapter')
                            ->numeric()
                            ->required(),

                        DatePicker::make('released_at')
                            ->label('Tanggal Rilis'),

                        Toggle::make('is_active')
                            ->label('Published')
                            ->default(true),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
