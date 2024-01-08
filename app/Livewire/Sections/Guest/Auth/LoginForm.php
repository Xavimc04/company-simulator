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
            if(Auth::user()->status != 'active') {
                Auth::logout(); 

                return toastr()->error('credentials', 'El usuario está deshabilitado o pendiente');
            }

            if(Auth::user()->center_id != null) {
                if(Auth::user()->center->status != 'active') {
                    Auth::logout(); 

                    return toastr()->error('credentials', 'El centro está deshabilitado o pendiente');
                }
            }

            if(Auth::user() && Auth::user()->role) {
                $role_name = Auth::user()->role->name; 
                
                if($role_name == 'Administrador') return redirect('/admin/dashboard');
                elseif($role_name == 'Profesor') return redirect('/teacher/dashboard');
                elseif($role_name == 'Estudiante') return redirect('/student/select');
                else return redirect('/');
            }

            session()->regenerate(); 

            return redirect('/');
        } else {
            return $this->addError('credentials', 'Las credenciales son incorrectas');
        }
    }

    public function render() {
        return view('livewire.sections.guest.auth.login-form');
    }
}
