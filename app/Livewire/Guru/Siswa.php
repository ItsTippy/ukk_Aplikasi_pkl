<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Siswa as siswaModel;
use App\Models\Industri;
use App\Models\Guru;
use App\Models\Pkl;
class Siswa extends Component
{
    public function render()
    {
       
        $siswas = SiswaModel::all(); 

        return view('livewire.guru.siswa', [
            'siswas' => $siswas,
        ]);
    }
}
