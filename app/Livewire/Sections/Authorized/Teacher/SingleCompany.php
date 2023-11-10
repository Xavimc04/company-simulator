<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use App\Models\Company; 
use Livewire\WithFileUploads;
use Livewire\Component;

class SingleCompany extends Component {
    use WithFileUploads;

    public $pages = [
        "Detalles", "Docentes", "Mercado", "Trabajadores", "Mayoristas", "Clientes", "Servicios", "Banca", "Eliminar datos", "Otros"
    ];

    public $company, $default_page = "Detalles";
    
    public $social_denomination, $name, $image, $cif, $sector, $phone, $location, $cp, $city, $contact_email, $form_level; 
    
    public function mount($company) {
        $this->company = $company;
        $this->social_denomination = $company->social_denomination;
        $this->name = $company->name; 
        $this->cif = $company->cif;
        $this->sector = $company->sector;
        $this->phone = $company->phone;
        $this->location = $company->location;
        $this->cp = $company->cp;
        $this->city = $company->city;
        $this->contact_email = $company->contact_email;
        $this->form_level = $company->form_level;
    }

    protected $rules = [
        'social_denomination' => 'required|string|max:255',
        'name' => 'required|string|max:255'
    ]; 

    public function save() {
        try {
            $this->validate(); 

            $this->company->social_denomination = $this->social_denomination;
            $this->company->name = $this->name; 
            $this->company->cif = $this->cif;
            $this->company->sector = $this->sector;
            $this->company->phone = $this->phone;
            $this->company->location = $this->location;
            $this->company->cp = $this->cp;
            $this->company->city = $this->city;
            $this->company->contact_email = $this->contact_email;
            $this->company->form_level = $this->form_level;
            $this->company->save();
            toastr()->success('Los datos se han guardado correctamente', '¡Éxito!');
        } catch (\Throwable $th) {
            toastr()->error('¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.');
        }
    }

    public function updatedImage() { 
        try {
            $this->validate([
                'image' => 'image',
            ]);
    
            $this->image->store('companies', 'public');
            $this->company->icon = $this->image->hashName();
            $this->company->save();
    
            toastr()->success("¡El logo de la empresa ha sido actualizado!");
        } catch (\Throwable $th) { 
            toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.");
        }
    }

    public function render() {
        return view('livewire.sections.authorized.teacher.single-company');
    }
}
