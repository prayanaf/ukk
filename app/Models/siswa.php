<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;

class siswa extends Model
{
    use HasRoles;
    protected $fillable = ['nama', 'nis', 'gender', 'alamat', 'kontak', 'email', 'status_pkl', 'foto_siswa'];


    public function getStatusPklLabelAttribute()
    {
        return $this->status_pkl ? 'Sedang PKL' : 'Belum PKL';
    }

    public function pkl()
    {
        return $this->hasMany(pkl::class);
    }

    // protected function fotoSiswa(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($foto) => url('/storage/siswa/' . $foto),
    //     );
    // }
}