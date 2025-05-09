<?php

namespace App\Exports;

use App\Models\Pkl;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PklExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Pkl::with(['siswa', 'industri', 'guru'])
            ->get()
            ->map(function ($pkl) {
                return [
                    'Nama Siswa' => $pkl->siswa->nama,
                    'Industri' => $pkl->industri->nama,
                    'Guru Pembimbing' => $pkl->guru->nama,
                    'Tanggal Mulai' => $pkl->mulai,
                    'Tanggal Selesai' => $pkl->selesai,
                ];
            });
    }

    public function headings(): array
    {
        return [
            'Nama Siswa',
            'Industri',
            'Guru Pembimbing',
            'Tanggal Mulai',
            'Tanggal Selesai',
        ];
    }
}
