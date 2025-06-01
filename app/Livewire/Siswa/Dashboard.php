<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;
use App\Models\Pkl;
use Carbon\Carbon;
use Livewire\WithPagination;

class Dashboard extends Component
{
    public $modalVisible = false;

    public  $siswa_id, $industri_id, $guru_id, $mulai, $selesai;

    protected $listeners = ['closeModal' => 'closeModal'];

    use WithPagination;

    public $search = '';

    public function mount()
    {
        // $this->loadData();
    }

    public function getDurasiAttribute()
    {
        if ($this->mulai && $this->selesai) {
            $mulai = Carbon::parse($this->mulai);
            $selesai = Carbon::parse($this->selesai);
            return $mulai->diffInDays($selesai);
        }
        return 0;
    }

    public function render()
{
    $query = Pkl::with(['siswa', 'industri']);

    if (!empty($this->search)) {
        $query->whereHas('siswa', function ($q) {
            $q->where('nama', 'like', '%' . $this->search . '%');
        });
    }

    $pkls = $query->latest()->paginate(5);

    return view('livewire.siswa.dashboard', [
        'pkls' => $pkls,
        'siswas' => Siswa::all(),
        'industris' => Industri::all(),
        'gurus' => Guru::all(),
    ]);
}


    // public function loadData()
    // {
    //     $this->pkls = Pkl::with(['siswa', 'industri'])->get();
    // }

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
        $siswa = Siswa::find($this->siswa_id);
    
        if (!$siswa) {
            session()->flash('error', 'Siswa tidak ditemukan.');
            return;
        }
    
        $sudahAda = Pkl::whereHas('siswa', function ($query) use ($siswa) {
            $query->where('nama', $siswa->nama);
        })->exists();
    
        if ($sudahAda) {
            session()->flash('error', 'Laporan PKL untuk siswa ini sudah pernah diisi.');
            return;
        }
    
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
        $this->resetForm();
        $this->resetPage(); // reset pagination ke halaman 1
        session()->flash('success', 'Laporan PKL berhasil disimpan.');
    }

    public function updatingSearch()
{
    $this->resetPage();
}
    
}