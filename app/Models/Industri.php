<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class industri extends Model
{
    /** @use HasFactory<\Database\Factories\IndsutriFactory> */
    use HasFactory;

    protected $fillable = [
        'nama',
        'bidang_usaha',
        'alamat',
        'kontak',
        'email',
        'guru_pembimbing'
    ];

    public function pkls()
    {
        return $this->hasMany(Pkl::class);
    }
}
