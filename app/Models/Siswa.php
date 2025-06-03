<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    /** @use HasFactory<\Database\Factories\SiswaFactory> */
    use HasFactory;

    protected $fillable = [
        'foto',
        'nama',
        'nis',
        'gender',
        'alamat',
        'kontak',
        'email',
        'status_pkl'
    ];

    

    public function pkl()
    {
        return $this->hasOne(Pkl
        ::class);
    }
 
 
    public function getGenderFullAttribute()
    {
        return $this->gender === 'L' ? 'Laki-laki' : ($this->gender === 'P' ? 'Perempuan' : 'Tidak diketahui');
    }
    
}
