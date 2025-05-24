<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Siswa([
            'nama'    => $row['nama'],
            'nis'     => $row['nis'],
            'gender'  => $row['gender'],
            'alamat'  => $row['alamat'],
            'kontak'  => $row['kontak'],
            'email'   => $row['email'],
        ]);
    }
}