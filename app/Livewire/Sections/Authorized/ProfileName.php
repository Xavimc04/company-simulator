<?php

namespace App\Livewire\Sections\Authorized;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProfileName extends Component {
    public $name, $editing = false;
    
    public function cancel() {
        $this->editing = false;
        $this->name = Auth::user()->name;
    }

    public function confirm() {
        $this->validate([
            'name' => 'required|min:3|max:255',
        ], [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'name.max' => 'El nombre debe tener máximo 255 caracteres',
        ]);

        $user = User::find(Auth::user()->id);
        $user->name = $this->name;
        $user->save();

        $this->editing = false;
    }

    public function mount() {
        $this->name = Auth::user()->name;
    }

    public function render() {
        return view('livewire.sections.authorized.profile-name');
    }
}
