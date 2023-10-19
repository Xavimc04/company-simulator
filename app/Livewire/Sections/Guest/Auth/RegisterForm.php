<?php

namespace App\Livewire\Sections\Guest\Auth;
use Livewire\Component;

class RegisterForm extends Component {
    public $name, $email, $password, $repeat; 

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'repeat' => 'required|min:8|same:password'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es requerido',
        'email.required' => 'El campo email es requerido',
        'email.email' => 'El campo email debe ser un email válido',
        'password.required' => 'El campo contraseña es requerido',
        'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
        'repeat.required' => 'El campo repetir contraseña es requerido',
        'repeat.min' => 'El campo repetir contraseña debe tener al menos 8 caracteres',
        'repeat.same' => 'El campo repetir contraseña debe ser igual al campo contraseña'
    ];

    public function confirm() {
        $this->validate();

        dd($this->name, $this->email, $this->password, $this->repeat); 
    }

    public function render() {
        return view('livewire.sections.guest.auth.register-form');
    }
}
