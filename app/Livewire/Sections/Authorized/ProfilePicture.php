<?php

namespace App\Livewire\Sections\Authorized;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfilePicture extends Component {
    use WithFileUploads;

    public $image; 

    public function updatedImage() { 
        try {
            $this->validate([
                'image' => 'image',
            ]);
    
            $this->image->store('profile-pictures', 'public');
    
            auth()->user()->update([
                'profile_url' => $this->image->hashName()
            ]);
    
            toastr()->success("¡Tu foto de perfil ha sido actualizada!", '¡Éxito!');
        } catch (\Throwable $th) {
            toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.", '¡Vaya!');
        }
    }

    public function render() {
        return view('livewire.sections.authorized.profile-picture');
    }
}
