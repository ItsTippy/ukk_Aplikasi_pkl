<?php
    namespace App\Livewire;
    use Livewire\Component;
    use App\Models\Pkl as pkmodel ;
    class Pkl extends Component
    {
        public function render()
        {
            return view('livewire.pkl', [
                'pkls' =>pkmodel::with(['siswa', 'industri', 'guru'])->get()
            ]);
        }
    }
