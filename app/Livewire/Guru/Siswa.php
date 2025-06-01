<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Siswa as SiswaModel;
use App\Models\Industri;
use App\Models\Guru;
use App\Models\Pkl;
use Livewire\WithPagination;
class Siswa extends Component
{

    use WithPagination;

    public $search = '';
    public function render()
    {
       
        $siswas = SiswaModel::latest()
            ->where('nama', 'like', '%' . $this->search . '%')
            ->orWhere('nis', 'like', '%' . $this->search . '%')
            ->orderBy('nama')
            ->paginate(5); // ✅ Wajib pakai paginate()

        return view('livewire.guru.siswa', compact('siswas'));
    }
}
