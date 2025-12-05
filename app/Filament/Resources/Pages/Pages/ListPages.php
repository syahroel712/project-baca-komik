<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Chapters\ChapterResource;
use App\Filament\Resources\Comics\ComicResource;
use App\Filament\Resources\Pages\PageResource;
use App\Models\Chapter;
use App\Models\Comic;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\RichEditor\Actions\LinkAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    public ?Comic $comic = null;
    public ?Chapter $chapter = null;

    public function mount(): void
    {
        parent::mount();

        $chapterId = request()->query('chapter_id');

        $this->chapter = Chapter::find($chapterId);

        if (! $this->chapter) {
            $this->redirect(ComicResource::getUrl());
        }

        if ($this->chapter) {
            $this->comic = $this->chapter->comic;
            if (! $this->chapter) {
                $this->redirect(ComicResource::getUrl());
            }
        }
    }

    public function getTitle(): string
    {
        if ($this->chapter && $this->comic) {
            return "Pages — {$this->comic->title} (Chapter: {$this->chapter->title})";
        }

        return "Pages";
    }

    protected function getHeaderActions(): array
    {
        $chapterId = $this->chapter?->id;

        return [
            CreateAction::make()
                ->label('Add Page')
                ->url(fn() => PageResource::getUrl('create', [
                    'chapter_id' => $chapterId,
                ])),

            // Multiple upload
            Action::make('addMultiple')
                ->label('Add Multiple Pages')
                ->color('success')
                ->url(fn() => PageResource::getUrl('multiple-create', [
                    'chapter_id' => $chapterId,
                ])),

            LinkAction::make('back')
                ->label('Back')
                ->icon('heroicon-o-arrow-left')
                ->url(fn() => ChapterResource::getUrl('index', [
                    'comic_id' => $this->comic->id,
                ]))
                ->color('secondary'),

        ];
    }

    protected function getTableQuery(): Builder
    {
        $query = parent::getTableQuery();

        if ($this->chapter) {
            $query->where('chapter_id', $this->chapter->id);
        }

        return $query;
    }
}
