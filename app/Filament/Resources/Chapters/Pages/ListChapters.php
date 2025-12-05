<?php

namespace App\Filament\Resources\Chapters\Pages;

use App\Filament\Resources\Chapters\ChapterResource;
use App\Filament\Resources\Comics\ComicResource;
use App\Models\Comic;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListChapters extends ListRecords
{
    protected static string $resource = ChapterResource::class;

    public ?Comic $comic = null;

    public function mount(): void
    {
        parent::mount();

        $comicId = request()->query('comic_id');

        $this->comic = Comic::find($comicId);

        if (! $this->comic) {
            $this->redirect(ComicResource::getUrl());
        }
    }

    public function getTitle(): string
    {
        return $this->comic ? "Chapters of: {$this->comic->title}" : "Chapters";
    }

    protected function getHeaderActions(): array
    {
        $comicId = $this->comic?->id;

        return [
            CreateAction::make()
                ->label('Add Chapter')
                ->url(fn() => ChapterResource::getUrl('create', [
                    'comic_id' => $comicId,
                ])),
        ];
    }
}
