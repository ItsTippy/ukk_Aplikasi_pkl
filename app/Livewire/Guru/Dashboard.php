<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;
use App\Models\Pkl;
class Dashboard extends Component
{
    public $pkls, $siswa_id, $industri_id, $guru_id, $mulai, $selesai;

    public function mount()
    {
        $this->pkls = Pkl::with(['siswa', 'industri'])->get();
    }

   public function render()
{
    return view('livewire.guru.dashboard');
    // atau 'livewire.guru.dashboard' untuk guru
}
}
