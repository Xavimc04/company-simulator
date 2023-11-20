<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\VerificationCode; 
use Illuminate\Support\Facades\Hash;
use App\Models\Role; 

class Invites extends Component {
    use WithPagination;

    protected $invites; 
    public $inviteFilter, $roles;
    public $role;
    public $generating, $linkUsages = 1; 

    public function restoreParams() {
        $this->reset(['role', 'linkUsages']);
    }

    protected $rules = [
        'role' => 'required', 
        'linkUsages' => 'required|numeric|min:1|max:100'
    ];

    protected $messages = [
        'role.required' => 'El campo rol es requerido', 
        'linkUsages.required' => 'El campo usos es requerido',
        'linkUsages.numeric' => 'El campo usos debe ser un número',
        'linkUsages.min' => 'El campo usos debe ser mínimo 1',
        'linkUsages.max' => 'El campo usos debe ser máximo 100'
    ];

    public function updatedGenerating() {
        $this->restoreParams(); 
    }

    public function generateLink() { 
        $this->validate();

        VerificationCode::create([
            'center_id' => Auth::user()->center_id,
            'role_id' => $this->role,
            'code' => rand(100000, 999999), 
            'usages' => $this->linkUsages
        ]);

        $this->generating = false; 
    }

    public function mount() {
        $this->roles = Role::where('name', '!=', 'Administrador')->get();
    }
    
    public function render() { 
        $this->invites = VerificationCode::where('code', 'like', '%' . $this->inviteFilter . '%')
        ->where('center_id', Auth::user()->center_id)
        ->where('usages', '>', 0)
        ->paginate(10);

        return view('livewire.sections.authorized.teacher.invites');
    }
}
