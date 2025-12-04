<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),

                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),

                ImageColumn::make('avatar')
                    ->disk('public')
                    ->label('Avatar')
                    ->size(40),             // ukuran thumbnail

                TextColumn::make('phone')
                    ->searchable(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('roles.name')
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
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
