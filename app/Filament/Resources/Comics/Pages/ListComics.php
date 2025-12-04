<?php

namespace App\Filament\Resources\Comics\Pages;

use App\Filament\Resources\Comics\ComicResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListComics extends ListRecords
{
    protected static string $resource = ComicResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
