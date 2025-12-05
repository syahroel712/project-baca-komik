<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PageResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePage extends CreateRecord
{
    protected static string $resource = PageResource::class;

    protected function getRedirectUrl(): string
    {
        // Ambil id dari query param atau fallback dari record
        $chapterId = request()->query('chapter_id') ?? $this->record->chapter_id;

        // Redirect ke index Chapter dengan chapter_id
        return PageResource::getUrl('index', ['chapter_id' => $chapterId]);
    }
}
