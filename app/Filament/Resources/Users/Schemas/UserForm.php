<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                //
                // 🟦 SECTION 1 : INFORMASI PRIBADI
                //
                Section::make('Informasi Pribadi')
                    ->description('Data pribadi pengguna.')
                    ->schema([
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),

                        FileUpload::make('avatar')
                            ->image()
                            ->disk('public')
                            ->directory('avatars')
                            ->visibility('public')
                            ->imagePreviewHeight('200')
                            ->maxSize(1024) // maksimal 1MB
                            ->nullable()
                            ->columnSpanFull(),

                        TextInput::make('phone')
                            ->tel()
                            ->maxLength(20)
                            ->nullable(),

                        Textarea::make('address')
                            ->maxLength(1000)
                            ->rows(3)
                            ->nullable(),
                    ])
                    ->columns(1),


                //
                // 🟦 SECTION 2 : INFORMASI AKUN
                //
                Section::make('Informasi Akun')
                    ->description('Email login dan password.')
                    ->schema([
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),

                        TextInput::make('password')
                            ->password()
                            ->required(fn(string $context) => $context === 'create')
                            ->dehydrateStateUsing(fn($state) => filled($state) ? bcrypt($state) : null)
                            ->dehydrated(fn($state) => filled($state))
                            ->maxLength(255),
                    ])
                    ->columns(1),
            ]);
    }
}
