<?php

namespace App\Filament\Resources\Comics;

use App\Filament\Resources\Comics\Pages\CreateComic;
use App\Filament\Resources\Comics\Pages\EditComic;
use App\Filament\Resources\Comics\Pages\ListComics;
use App\Filament\Resources\Comics\Pages\ViewComic;
use App\Filament\Resources\Comics\Schemas\ComicForm;
use App\Filament\Resources\Comics\Schemas\ComicInfolist;
use App\Filament\Resources\Comics\Tables\ComicsTable;
use App\Models\Comic;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ComicResource extends Resource
{
    protected static ?string $model = Comic::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ComicForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ComicInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ComicsTable::configure($table);
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
            'index' => ListComics::route('/'),
            'create' => CreateComic::route('/create'),
            'view' => ViewComic::route('/{record}'),
            'edit' => EditComic::route('/{record}/edit'),
        ];
    }
}
