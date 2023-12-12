<?php

namespace App\Livewire\Sections\Guest\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\GenericEmail;
use App\Models\PasswordReset;
use Illuminate\Support\Facades\Hash;

class PasswordResetForm extends Component {
    public $password, $repeat, $token; 

    protected $rules = [
        'password' => 'required|min:8|same:repeat',
        'repeat' => 'required|min:8'
    ];

    protected $messages = [
        'password.required' => 'La contraseña es requerida.',
        'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
        'password.same' => 'Las contraseñas no coinciden.',
        'repeat.required' => 'La confirmación de la contraseña es requerida.',
        'repeat.min' => 'La confirmación de la contraseña debe tener al menos 8 caracteres.'
    ];

    public function mount($token) {
        $this->token = $token;
    }

    public function confirm($token) {
        $this->validate();

        $passwordReset = PasswordReset::where('token', hash('sha256', $token))->first();

        $isTokenExpired = strtotime($passwordReset->created_at) < strtotime('-5 minutes');
        
        if ($isTokenExpired) {
            $passwordReset->delete();

            toastr()->error('El token ha expirado.');
        }

        $user = User::where('email', $passwordReset->email)->first();

        if ($user) {
            $user->password = Hash::make($this->password);
            $user->save();

            $passwordReset->delete();

            toastr()->success('Se ha actualizado la contraseña correctamente.');

            $emailSend = Mail::to($user->email)->send(new GenericEmail(
                "Contraseña actualizada", 
                "Tu contraseña ha sido actualizada correctamente. Si no has sido tú, por favor, contacta con el administrador o haz click en el siguiente enlace para recuperar tu contraseña: " . route('recover')
            ));

            return redirect()->route('login');
        } else {
            toastr()->error('El correo electrónico no se encuentra registrado.');
        }
    }

    public function render() {
        return view('livewire.sections.guest.auth.password-reset-form');
    }
}
