<?php

namespace App\Filament\Resources\GeneratedDocuments\Pages;

use App\Filament\Resources\GeneratedDocuments\GeneratedDocumentResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGeneratedDocument extends ViewRecord
{
    protected static string $resource = GeneratedDocumentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
