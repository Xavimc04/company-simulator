<?php

namespace App\Livewire\Sections\Guest\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use App\Models\Role; 
use App\Models\Center; 
use App\Models\VerificationCode; 

class RegisterForm extends Component {
    public $name, $email, $password, $repeat, $verification_code, $doesUserExist; 

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

        if($this->doesUserExist) {
            if(strlen($this->verification_code) <= 0) {
                return toastr()->error("El código de validación es requerido", '¡Vaya!');
            }
        }

        $email_taken = User::where('email', $this->email)->first(); 

        if($email_taken) return $this->addError('email_taken', 'El email ya está en uso');

        if(!$this->doesUserExist) {
            $role = Role::create([
                'name' => "Administrador"
            ]);
            
            Role::insert([
                ['name' => "Profesor"],
                ['name' => "Estudiante"],
            ]);

            
            if(!$role) return; 

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role_id' => $role->id,
                'status' => 'active', 
                'password' => Hash::make($this->password)
            ]);

            return redirect('/login');
        } else {
            $verification_code = VerificationCode::where('code', $this->verification_code)->first();

            if(!$verification_code) {
                toastr()->error("El código de validación es incorrecto", '¡Vaya!');
                return; 
            }

            $role_id = $verification_code->role_id;
            $center_id = $verification_code->center_id;

            $role = Role::find($role_id);
            $center = Center::find($center_id);

            if(!$role || !$center) {
                toastr()->error("El rol o centro que fué asignado a esta invitación ya no existe", '¡Vaya!');
                return; 
            }

            User::create([
                'name' => $this->name,
                'email' => $this->email,
                'role_id' => $role->id,
                'center_id' => $center->id,
                'status' => $role->name == 'Profesor' ? 'active' : 'pending',
                'password' => Hash::make($this->password)
            ]);

            if(($verification_code->usages - 1) > 0) {
                VerificationCode::where('code', $this->verification_code)->update([
                    'usages' => $verification_code->usages - 1
                ]);
            } else {
                VerificationCode::where('code', $this->verification_code)->delete();
            }

            return redirect('/login');
        }
    }

    public function render() {
        $this->doesUserExist = false; 

        if(User::count() > 0) {
            $this->doesUserExist = true; 
        }

        return view('livewire.sections.guest.auth.register-form');
    }
}
