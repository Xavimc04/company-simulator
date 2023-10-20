<?php

namespace App\Livewire\Sections\Guest\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component {
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8'
    ];

    protected $messages = [
        'email.required' => 'El campo email es requerido',
        'email.email' => 'El campo email debe ser un email válido',
        'password.required' => 'El campo contraseña es requerido',
        'password.min' => 'El campo contraseña debe tener al menos 8 caracteres'
    ];

    public function confirm() {
        $this->validate(); 

        if(Auth::attempt([
            'email' => $this->email, 
            'password' => $this->password
        ])) {
            session()->regenerate(); 
            
            return redirect('/dashboard');
        } else {
            return $this->addError('credentials', 'Las credenciales son incorrectas');
        }
    }

    public function render() {
        return view('livewire.sections.guest.auth.login-form');
    }
}
