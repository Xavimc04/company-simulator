<?php

namespace App\Livewire\Sections\Guest\Auth;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\GenericEmail; 
use App\Models\PasswordReset; 
use Illuminate\Support\Facades\Hash;

class RecoverForm extends Component {
    public $email; 

    protected $rules = [
        'email' => 'required|email|exists:users,email',
    ];

    protected $messages = [
        'email.required' => 'El correo electrónico es requerido.',
        'email.email' => 'El correo electrónico no es válido.',
        'email.exists' => 'El correo electrónico no se encuentra registrado.'

    ];

    public function recover() {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if ($user) {
            $code = rand(100000, 999999);

            $doesCodeExist = PasswordReset::where('email', $user->email)->first();

            if ($doesCodeExist) {
                $doesCodeExist->delete();
            }

            PasswordReset::create([
                'email' => $user->email,
                'token' => hash('sha256', $code)
            ]);

            $wasSend = Mail::to($user->email)->send(new GenericEmail(
                "Recuperación de contraseña", 
                "Se ha solicitado la recuperación de contraseña para la cuenta asociada a este correo electrónico. Si no has sido tú, ignora este mensaje. De lo contrario, haz click en el siguiente enlace para recuperar tu contraseña: " . route('password.reset', ['token' => $code])
            ));

            if ($wasSend) {
                toastr()->success('Se ha enviado un correo electrónico con las instrucciones para recuperar la contraseña.');
            } else {
                toastr()->error('Ha ocurrido un error al enviar el correo electrónico.');
            }
        } else {
            toastr()->error('El correo electrónico no se encuentra registrado.');
        }
    }

    public function render() {
        return view('livewire.sections.guest.auth.recover-form');
    }
}
