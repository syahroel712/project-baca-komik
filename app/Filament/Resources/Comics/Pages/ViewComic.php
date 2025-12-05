<?php

namespace App\Filament\Resources\Comics\Pages;

use App\Filament\Resources\Chapters\ChapterResource;
use App\Filament\Resources\Comics\ComicResource;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewComic extends ViewRecord
{
    protected static string $resource = ComicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            Action::make('manage_chapters')
                ->label('Chapters')
                ->icon('heroicon-o-rectangle-stack')
                ->url(fn($record) => ChapterResource::getUrl('index', [
                    'comic_id' => $record->id,
                ])),
        ];
    }
}
