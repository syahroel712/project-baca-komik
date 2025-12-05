<?php

namespace App\Filament\Resources\Chapters;

use App\Filament\Resources\Chapters\Pages\CreateChapter;
use App\Filament\Resources\Chapters\Pages\EditChapter;
use App\Filament\Resources\Chapters\Pages\ListChapters;
use App\Filament\Resources\Chapters\Pages\ViewChapter;
use App\Filament\Resources\Chapters\Schemas\ChapterForm;
use App\Filament\Resources\Chapters\Schemas\ChapterInfolist;
use App\Filament\Resources\Chapters\Tables\ChaptersTable;
use App\Filament\Resources\Comics\ComicResource;
use App\Models\Chapter;
use App\Models\Comic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ChapterResource extends Resource
{
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $model = Chapter::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ChapterForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ChapterInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ChaptersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListChapters::route('/'),
            'create' => CreateChapter::route('/create'),
            'view' => ViewChapter::route('/{record}'),
            'edit' => EditChapter::route('/{record}/edit'),
        ];
    }

    public static function getTableQuery(): Builder
    {
        $comicId = request()->query('comic_id');

        $query = parent::getTableQuery();

        if ($comicId) {
            $query->where('comic_id', $comicId);
        }

        return $query;
    }
}
