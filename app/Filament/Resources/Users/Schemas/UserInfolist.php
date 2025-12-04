<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Informasi Pribadi ')
                    ->schema([
                        ImageEntry::make('avatar')
                            ->disk('public')
                            ->placeholder('-'),

                        TextEntry::make('name'),

                        TextEntry::make('phone')
                            ->placeholder('-'),

                        TextEntry::make('address')
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),

                Section::make('Informasi Akun ')
                    ->schema([
                        TextEntry::make('email')
                            ->label('Email address'),

                        TextEntry::make('email_verified_at')
                            ->dateTime()
                            ->placeholder('-'),

                        TextEntry::make('created_at')
                            ->dateTime()
                            ->placeholder('-'),

                        TextEntry::make('updated_at')
                            ->dateTime()
                            ->placeholder('-'),
                    ])
                    ->columns(2),
            ]);
    }
}
