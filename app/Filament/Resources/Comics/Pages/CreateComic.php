<?php

namespace App\Filament\Resources\Comics\Pages;

use App\Filament\Resources\Comics\ComicResource;
use Filament\Resources\Pages\CreateRecord;

class CreateComic extends CreateRecord
{
    protected static string $resource = ComicResource::class;
}
