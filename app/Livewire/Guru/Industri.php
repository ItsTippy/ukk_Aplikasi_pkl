<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Industri as IndusriModel;
use App\Models\Guru;
use App\Models\Pkl;
use Livewire\WithPagination;
class Industri extends Component
{
    use WithPagination;

    public $search = '';
    public function render()
    {
        $industris = IndusriModel::latest()
        ->where('nama', 'like', '%' . $this->search . '%')
        // ->orWhere('nis', 'like', '%' . $this->search . '%')
        ->orderBy('nama')
        ->paginate(5); // ✅ Wajib pakai paginate()

    return view('livewire.guru.industri', compact('industris'));
    }
}
