<?php

namespace App\Filament\Resources\Comics\Pages;

use App\Filament\Resources\Comics\ComicResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditComic extends EditRecord
{
    protected static string $resource = ComicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
