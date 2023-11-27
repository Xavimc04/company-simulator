<?php

namespace App\Livewire\Sections\Authorized\Admin;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Center; 
use App\Models\Role; 
use App\Models\VerificationCode; 

class Centers extends Component {
    use WithPagination;

    protected $centers;
    
    public $centerFilter, $name, $email, $creating, $editing, $status;
    public $inviting; 

    public function restoreForm() {
        $this->reset(['name', 'email', 'creating', 'status']);
    }

    public function handleCreateModal() {
        $this->restoreForm(); 
        $this->creating = true; 
    }

    public function handleEditModal($company_id) {
        $this->handleCreateModal();
        $this->editing = $company_id;
        
        $company = Center::find($company_id);

        if($company) {
            $this->name = $company->name;
            $this->email = $company->email;
            $this->status = $company->status;
        }
    }

    protected $rules = [
        'name' => 'required|min:3|max:255',
        'email' => 'required|email|unique:centers,email',
        'status' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El nombre es requerido.',
        'name.min' => 'El nombre debe tener al menos 3 caracteres.',
        'name.max' => 'El nombre debe tener máximo 255 caracteres.',
        'email.required' => 'El correo electrónico es requerido.',
        'email.email' => 'El correo electrónico debe ser válido.',
        'email.unique' => 'El correo electrónico ya está en uso.',
        'status.required' => 'El estado es requerido.'
    ];

    public function inviteContact($center_id) {
        $this->restoreForm(); 
        $this->inviting = $center_id; 
    }

    public function confirmInvite() {
        if(!$this->email && strlen($this->email) <= 0) {
            toastr()->error("La dirección de correo es inválida");
            return; 
        } 

        $code = rand(100000, 999999); 

        $wasSend = VerificationCode::create([
            'center_id' => $this->inviting,
            'role_id' => Role::where('name', 'Profesor')->first()->id,
            'code' => $code, 
            'usages' => 1
        ]);

        if($wasSend) {
            $this->inviting = false; 
            toastr()->success("Se ha enviado un correo electrónico con el código de verificación", '¡Éxito!');
            return;
        } else {
            toastr()->error("Ha ocurrido un error al enviar el correo electrónico");
            return; 
        }
    }

    public function edit() {
        if(!$this->status) {
            $this->status = 'inactive'; 
        }

        $company = Center::find($this->editing);

        $company->update([
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status
        ]);

        $this->creating = false; 
        $this->editing = false;
    }

    public function create() {
        $this->validate(); 

        if(!$this->status) {
            $this->status = 'inactive'; 
        }

        Center::create([
            'name' => $this->name,
            'email' => $this->email,
            'status' => $this->status
        ]);

        $this->creating = false; 
        $this->editing = false;
    }

    public function render() {
        $this->centers = Center::where('name', 'like', "%{$this->centerFilter}%")->paginate(10);

        return view('livewire.sections.authorized.admin.centers');
    }
}
