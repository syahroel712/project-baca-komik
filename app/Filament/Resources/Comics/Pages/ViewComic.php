<?php

namespace App\Filament\Resources\Comics\Pages;

use App\Filament\Resources\Comics\ComicResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewComic extends ViewRecord
{
    protected static string $resource = ComicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
