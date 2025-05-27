<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;
use App\Models\Pkl;
use Carbon\Carbon;

class Dashboard extends Component
{
    public $modalVisible = false;

    public $pkls, $siswa_id, $industri_id, $guru_id, $mulai, $selesai;

    protected $listeners = ['closeModal' => 'closeModal'];

    public function mount()
    {
        $this->loadData();
    }

    public function render()
    {
        return view('livewire.siswa.dashboard', [
            'siswas' => Siswa::all(),
            'industris' => Industri::all(),
            'gurus' => Guru::all(),
            'pkls' => $this->pkls,
        ]);
    }

    public function loadData()
    {
        $this->pkls = Pkl::with(['siswa', 'industri'])->get();
    }

    public function showModal()
    {
        $this->resetForm();
        $this->modalVisible = true;
    }

    public function closeModal()
    {
        $this->modalVisible = false;
    }

    public function resetForm()
    {
        $this->siswa_id = '';
        $this->industri_id = '';
        $this->guru_id = '';
        $this->mulai = '';
        $this->selesai = '';
    }

    public function save()
    {
        $this->validate([
            'siswa_id' => 'required',
            'industri_id' => 'required',
            'guru_id' => 'required',
            'mulai' => 'required|date',
            'selesai' => 'required|date|after_or_equal:mulai',
        ]);

        Pkl::create([
            'siswa_id' => $this->siswa_id,
            'industri_id' => $this->industri_id,
            'guru_id' => $this->guru_id,
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);

        $this->modalVisible = false;
        $this->loadData();
    }
}
