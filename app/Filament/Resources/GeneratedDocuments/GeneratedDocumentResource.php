<?php

namespace App\Filament\Resources\GeneratedDocuments;

use App\Filament\Resources\GeneratedDocuments\Pages\CreateGeneratedDocument;
use App\Filament\Resources\GeneratedDocuments\Pages\EditGeneratedDocument;
use App\Filament\Resources\GeneratedDocuments\Pages\ListGeneratedDocuments;
use App\Filament\Resources\GeneratedDocuments\Pages\ViewGeneratedDocument;
use App\Filament\Resources\GeneratedDocuments\Schemas\GeneratedDocumentForm;
use App\Filament\Resources\GeneratedDocuments\Schemas\GeneratedDocumentInfolist;
use App\Filament\Resources\GeneratedDocuments\Tables\GeneratedDocumentsTable;
use App\Models\GeneratedDocument;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class GeneratedDocumentResource extends Resource
{
    protected static ?string $model = GeneratedDocument::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return GeneratedDocumentForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return GeneratedDocumentInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return GeneratedDocumentsTable::configure($table);
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
            'index' => ListGeneratedDocuments::route('/'),
            'create' => CreateGeneratedDocument::route('/create'),
            'view' => ViewGeneratedDocument::route('/{record}'),
            'edit' => EditGeneratedDocument::route('/{record}/edit'),
        ];
    }
}
