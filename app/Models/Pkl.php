<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Pkl extends Model
{
    use HasFactory;

    protected $appends = ['durasi'];


    protected $fillable = [
        'siswa_id',
        'guru_id',
        'industri_id',
        'mulai',
        'selesai',
    ];

    public function getDurasiAttribute()
    {
        if ($this->mulai && $this->selesai) {
            $mulai = Carbon::parse($this->mulai);
            $selesai = Carbon::parse($this->selesai);

            return $mulai->diffInDays($selesai) . ' hari';
        }

        return null;
    }

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
