<?php

namespace App\Filament\Resources\Comics\Tables;

use App\Filament\Resources\Chapters\ChapterResource;
use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class ComicsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                ImageColumn::make('cover')
                    ->disk('public')
                    ->height(60)
                    ->width(45),
                TextColumn::make('author')->sortable(),
                TextColumn::make('rating')->sortable(),
                TextColumn::make('type')->sortable(),
                TextColumn::make('status')
                    ->sortable()
                    ->badge()
                    ->colors([
                        'warning' => 'ongoing',
                        'success' => 'completed',
                        'gray' => 'hiatus',
                    ]),
                TextColumn::make('views')->sortable(),
                TextColumn::make('likes')->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('manage_chapters')
                    ->label('Chapters')
                    ->icon('heroicon-o-rectangle-stack')
                    ->url(fn($record) => ChapterResource::getUrl('index', [
                        'comic_id' => $record->id,
                    ])),
            ]);
    }
}
