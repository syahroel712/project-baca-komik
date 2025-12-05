<?php

namespace App\Filament\Resources\Pages\Pages;

use App\Filament\Resources\Pages\PageResource;
use App\Models\Chapter;
use App\Models\Page as ModelsPage;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor\Actions\LinkAction;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms; // 👈 WAJIB
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Pages\Page;

class PageMultipleCreate extends Page
{
    use InteractsWithForms;

    protected static string $resource = PageResource::class;

    protected string $view = 'filament.resources.pages.pages.page-multiple-create';

    public ?Chapter $chapter = null;

    public array $pages = [];

    // Filament 4 menggunakan $data, bukan $form
    public array $data = [];

    public function mount(): void
    {
        $chapterId = request()->query('chapter_id');

        $this->chapter = Chapter::find($chapterId);

        if (! $this->chapter) {
            abort(404);
        }

        $this->form->fill([
            'pages' => [
                ['image' => null],
            ],
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            Repeater::make('pages')
                ->schema([
                    FileUpload::make('image')
                        ->image()
                        ->disk('public')
                        ->directory('pages'),
                ])
                ->minItems(1),
        ];
    }

    public function create()
    {
        $data = $this->form->getState();

        $orderStart = ModelsPage::where('chapter_id', $this->chapter->id)->max('order') ?? 0;
        $order = $orderStart;

        foreach ($data['pages'] as $item) {
            if (!isset($item['image'])) continue;

            ModelsPage::create([
                'chapter_id' => $this->chapter->id,
                'image'      => $item['image'],
                'order'      => ++$order,
            ]);
        }

        Notification::make()->title('Multiple pages added successfully!')->success()->send();

        return redirect(PageResource::getUrl('index', [
            'chapter_id' => $this->chapter->id,
        ]));
    }

    public function getTitle(): string
    {
        return "Upload Multiple Pages — {$this->chapter->title}";
    }

    protected function getHeaderActions(): array
    {
        return [
            LinkAction::make('back')
                ->label('Back')
                ->icon('heroicon-o-arrow-left')
                ->url(fn() => PageResource::getUrl('index', [
                    'chapter_id' => $this->chapter->id,
                ]))
                ->color('secondary'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        // Gunakan chapter_id dari record yang diedit
        $chapterId = $this->record->chapter_id;

        return PageResource::getUrl('index', ['chapter_id' => $chapterId]);
    }
}
