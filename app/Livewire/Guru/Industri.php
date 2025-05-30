<?php

namespace App\Livewire\Guru;

use Livewire\Component;
use App\Models\Industri as indusriModel;
use App\Models\Guru;
use App\Models\Pkl;
class Industri extends Component
{
    public function render()
    {
        $industris = indusriModel::all();
        return view('livewire.guru.industri',[
            'industris' => $industris
        ]);
    }
}
