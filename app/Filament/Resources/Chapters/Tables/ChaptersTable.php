<?php

namespace App\Filament\Resources\Chapters\Tables;

use App\Filament\Resources\Chapters\ChapterResource;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ChaptersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('comic.title')->label('Comic')->sortable()->searchable(),
                TextColumn::make('title')->label('Judul')->searchable(),
                TextColumn::make('number')->label('Chapter')->sortable(),
                IconColumn::make('is_active')->boolean()->label('Publish'),
                TextColumn::make('released_at')->label('Tanggal Rilis')->date(),
                TextColumn::make('created_at')->label('Dibuat')->dateTime(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
