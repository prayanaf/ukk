<?php

namespace App\Filament\Resources\GuruResource\Pages;

use App\Filament\Resources\GuruResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGurus extends ManageRecords
{
    protected static string $resource = GuruResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add New Guru'), // Ganti teks tombol di sini
        ];
    }

    public function getTitle(): string
    {
        return 'Gurus List'; // Opsional: ganti judul halaman
    }
    
}
