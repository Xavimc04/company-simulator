<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use App\Models\Role; 

class Users extends Component {
    use WithPagination;

    public $userFilter, $creating, $roles, $deleting;
    public $name, $email, $password, $password_confirmation, $role;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
        'role' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es requerido',
        'name.min' => 'El campo nombre debe tener al menos 3 caracteres',
        'email.required' => 'El campo email es requerido',
        'email.email' => 'El campo email debe ser un email válido',
        'email.unique' => 'El campo email ya está en uso',
        'password.required' => 'El campo contraseña es requerido',
        'password.min' => 'El campo contraseña debe tener al menos 8 caracteres',
        'password.confirmed' => 'El campo contraseña no coincide con su confirmación',
        'role.required' => 'El campo rol es requerido'
    ];

    public function restoreParams() {
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'role']);
    }

    public function handleCreateModal() {
        $this->restoreParams(); 
        $this->creating = true; 
    }

    public function delete($user_id) {
        if(!$this->deleting) {
            $this->deleting = $user_id; 
        } else {
            if($user_id == $this->deleting) {
                $this->deleting = false; 
                User::find($user_id)->delete();
            } else {
                $this->deleting = $user_id;
            }
        }
    }

    public function createUser() {
        $this->validate(); 

        if(User::where('email', $this->email)->first()) {
            return toastr()->error("El email ya está en uso");
        }

        $creating = false; 

        User::create([
            'name' => $this->name, 
            'email' => $this->email, 
            'password' => Hash::make($this->password), 
            'role_id' => $this->role
        ]);
    }

    public function updatingSearch() {
        $this->resetPage();
    }

    public function mount() {
        $this->roles = Role::all();
    }

    public function render() { 
        return view('livewire.sections.authorized.teacher.users', [
            "users" => User::where('name', 'like', '%' . $this->userFilter . '%')->paginate(10)
        ]);
    }
}
