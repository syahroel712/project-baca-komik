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
                //
                // 🟦 INFORMASI PRIBADI
                //
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

                //
                // 🟦 INFORMASI AKUN
                //
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

                //
                // 🟦 ROLE & PERMISSION
                //
                Section::make('Role & Permission')
                    ->schema([
                        TextEntry::make('roles.name')
                            ->label('Roles')
                            ->formatStateUsing(function ($state) {
                                // Jika state array -> format semua nama role
                                if (is_array($state)) {
                                    return implode(', ', array_map(
                                        fn($role) =>
                                        ucwords(str_replace('_', ' ', $role)),
                                        $state
                                    ));
                                }

                                // Jika string tunggal
                                if (is_string($state)) {
                                    return ucwords(str_replace('_', ' ', $state));
                                }

                                return '-';
                            })
                            ->placeholder('-')
                            ->columnSpanFull(),
                    ])
                    ->columns(1),
            ]);
    }
}
