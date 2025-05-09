<?php

namespace App\Filament\Resources\IndustriResource\Pages;

use App\Filament\Resources\IndustriResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageIndustris extends ManageRecords
{
    protected static string $resource = IndustriResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add New Industri'), // Ganti teks tombol di sini
        ];
    }

    public function getTitle(): string
    {
        return 'Industris List'; // Opsional: ganti judul halaman
    }
}
