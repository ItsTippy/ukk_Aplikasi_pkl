<?php

namespace App\Livewire\Guru;

use Livewire\Component;

class Dashboard extends Component
{
   public function render()
{
    return view('livewire.siswa.dashboard');
    // atau 'livewire.guru.dashboard' untuk guru
}
}
