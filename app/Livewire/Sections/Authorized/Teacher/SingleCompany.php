<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use App\Models\Company; 
use Livewire\Component;

class SingleCompany extends Component {
    public $pages = [
        "Detalles", "Docentes", "Mercado", "Trabajadores", "Mayoristas", "Clientes", "Servicios", "Banca", "Eliminar datos", "Otros"
    ];

    public $company, $current_page = "Detalles";
    
    public $social_denomination, $name, $image, $cif, $sector; 
    
    public function mount($company) {
        $this->company = $company;
    }

    public function render() {
        return view('livewire.sections.authorized.teacher.single-company');
    }
}
