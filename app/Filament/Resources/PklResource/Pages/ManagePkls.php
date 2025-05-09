<?php

namespace App\Filament\Resources\PklResource\Pages;

use App\Filament\Resources\PklResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePkls extends ManageRecords
{
    protected static string $resource = PklResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add New Pkl'), // Ganti teks tombol di sini
        ];
    }

    public function getTitle(): string
    {
        return 'Pkls Recap List'; // Opsional: ganti judul halaman
    }
}
