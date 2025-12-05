<?php

namespace App\Filament\Resources\Chapters\Pages;

use App\Filament\Resources\Chapters\ChapterResource;
use Filament\Resources\Pages\CreateRecord;

class CreateChapter extends CreateRecord
{
    protected static string $resource = ChapterResource::class;

    protected function getRedirectUrl(): string
    {
        // Ambil comic_id dari query param atau fallback dari record
        $comicId = request()->query('comic_id') ?? $this->record->comic_id;

        // Redirect ke index Chapter dengan comic_id
        return ChapterResource::getUrl('index', ['comic_id' => $comicId]);
    }
}
