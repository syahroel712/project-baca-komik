<?php

namespace App\Filament\Resources\Chapters\Pages;

use App\Filament\Resources\Chapters\ChapterResource;
use Filament\Actions\EditAction;
use Filament\Forms\Components\RichEditor\Actions\LinkAction;
use Filament\Resources\Pages\ViewRecord;

class ViewChapter extends ViewRecord
{
    protected static string $resource = ChapterResource::class;

    protected function getHeaderActions(): array
    {
        $comicId = $this->record->comic_id;

        return [
            LinkAction::make('back')
                ->label('Back')
                ->icon('heroicon-o-arrow-left')
                ->url(fn() => ChapterResource::getUrl('index', [
                    'comic_id' => $comicId,
                ]))
                ->color('secondary'),

            EditAction::make(),
        ];
    }
}
