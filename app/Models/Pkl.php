<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pkl extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'guru_id',
        'industri_id',
        'mulai',
        'selesai',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function industri()
    {
        return $this->belongsTo(Industri::class);
    }

    protected static function booted()
    {   
        static::deleted(function ($pkl) {
            $pkl->siswa()->update(['status_pkl' => 'Tidak aktif']);
        });
        static::created(function ($pkl) {
            $pkl->siswa()->update(['status_pkl' => 'aktif']);
        });
        static::created(function ($pkl) {
            $pkl->siswa()->update(['status_pkl' => 'Aktif']);
        });
    }
}
