<?php

namespace App\Livewire\Sections\Authorized\Student\Sells;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Company; 

class Website extends Component {
    public $website, $company; 

    public function save() {
        $this->validate([
            'website' => 'required|url'
        ], [
            'website.required' => 'El campo página web es obligatorio', 
            'website.url' => 'El campo página web debe ser una URL válida'
        ]);

        try {
            $this->company->website = $this->website; 
            $this->company->save(); 

            toastr()->success('La página web se ha guardado correctamente', '¡Éxito!');
        } catch (\Throwable $th) {
            toastr()->error('Ocurrió un error al guardar la página web', '¡Error!');
        } 
    }

    public function mount() {
        $this->company = Company::find(Auth::user()->current_company); 
        $this->website = $this->company->website; 
    }

    public function render() {
        $this->company = Company::find(Auth::user()->current_company); 

        return view('livewire.sections.authorized.student.sells.website');
    }
}
