<?php

namespace App\Livewire\Sections\Guest\Auth;
use Livewire\Component;

class LoginForm extends Component {
    public $email, $password;

    public function render() {
        return view('livewire.sections.guest.auth.login-form');
    }
}
