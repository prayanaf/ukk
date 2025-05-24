<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'website',
        'bidang_usaha',
        'alamat',
        'kontak',
        'email',
        'guru_pembimbing',
    ];

    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }

    public function guruPembimbing()
    {
        return $this->belongsTo(\App\Models\Guru::class, 'guru_pembimbing');
    }    
}
