<?php

namespace App\Filament\Resources\Templates\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TemplateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('document_type_id')
                    ->relationship('documentType', 'name')
                    ->required()
                    ->label('Jenis Surat'),
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Template'),
                RichEditor::make('content')
                    ->required()
                    ->label('Konten Template')
                    ->helperText('Gunakan placeholder seperti {{nama}}, {{alamat}}, {{perusahaan}}')
                    ->columnSpanFull(),
                Toggle::make('is_premium')
                    ->label('Premium')
                    ->default(false),
                Toggle::make('is_active')
                    ->label('Aktif')
                    ->default(true),
            ]);
    }
}
