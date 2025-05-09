<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Siswa extends Model
{
    use HasRoles;

    protected $fillable = [
        'nama',
        'nis',
        'gender',
        'alamat',
        'kontak',
        'email',
        'status_pkl',
        'foto_siswa', 
    ];

    protected $casts = [
        'status_pkl' => 'boolean',
    ];

    public function pkl()
    {
        return $this->hasOne(Pkl::class);
    }
}
