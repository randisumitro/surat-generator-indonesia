<?php

namespace App\Filament\Resources\GeneratedDocuments\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class GeneratedDocumentInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('document_type_id')
                    ->numeric(),
                TextEntry::make('template_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('data_json')
                    ->columnSpanFull(),
                TextEntry::make('generated_content')
                    ->columnSpanFull(),
                TextEntry::make('ip_address')
                    ->placeholder('-'),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
