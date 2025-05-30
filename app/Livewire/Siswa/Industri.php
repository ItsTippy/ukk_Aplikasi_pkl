<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Industri as IndustriModel;

class Industri extends Component
{
    public $nama, $bidang_usaha, $alamat, $kontak, $email;
    public $showModal = false;

    // Validasi input form
    protected $rules = [
        'nama' => 'required|string|max:255|unique:industris,nama',
        'bidang_usaha' => 'required|string|max:255',
        'alamat' => 'required|string',
        'kontak' => 'required|string|max:20',
        'email' => 'required|email|max:255',
    ];

    protected $messages = [
        'nama.unique' => 'Nama industri sudah terdaftar.',
    ];
    

    // Tampilkan modal input dan reset nilai input
    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    // Simpan data ke database
    public function save()
{
    $this->validate();

    IndustriModel::create([
        'nama' => $this->nama,
        'bidang_usaha' => $this->bidang_usaha,
        'alamat' => $this->alamat,
        'kontak' => $this->kontak,
        'email' => $this->email,
    ]);

    $this->resetForm();
    $this->showModal = false;

    session()->flash('message', 'Industri berhasil ditambahkan.');
}

    // Reset semua field input
    private function resetForm()
    {
        $this->reset(['nama', 'bidang_usaha', 'alamat', 'kontak', 'email']);
    }

    // Tampilkan data industri
    public function render()
    {
        $industris = IndustriModel::latest()->get();
        return view('livewire.siswa.industri', compact('industris'));
    }
}
