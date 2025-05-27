<?php
namespace App\Livewire\Auth\Siswa;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        $credentials = $this->only(['email', 'password']);

        if (Auth::attempt($credentials, $this->remember)) {
            session()->regenerate();

            if (Auth::user()->hasRole('siswa')) {
                return redirect()->intended('/siswa/dashboard');
            } else {
                Auth::logout();
                session()->invalidate();
                session()->regenerateToken();
                return back()->withErrors(['email' => 'Akun ini bukan siswa.']);
            }
        }

        $this->addError('email', __('These credentials do not match our records.'));
    }

    public function render()
    {
        return view('livewire.auth.siswa.login');
    }
}
