<?php

namespace App\Filament\Resources\GeneratedDocuments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class GeneratedDocumentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('document_type_id')
                    ->required()
                    ->numeric(),
                TextInput::make('template_id')
                    ->numeric(),
                Textarea::make('data_json')
                    ->required()
                    ->columnSpanFull(),
                Textarea::make('generated_content')
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('ip_address'),
            ]);
    }
}
