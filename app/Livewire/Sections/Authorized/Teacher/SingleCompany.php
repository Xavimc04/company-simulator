<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use App\Models\Company; 
use Livewire\WithFileUploads;
use App\Models\User; 
use Livewire\Component;
use App\Models\CompanyTeacher; 
use App\Models\Role; 
use App\Models\CompanyMarket; 

class SingleCompany extends Component {
    use WithFileUploads;

    // @ Main
    public $pages = [
        "Detalles", "Docentes", "Mercado", "Trabajadores", "Mayoristas", "Clientes", "Servicios", "Banca", "Eliminar datos", "Otros"
    ];

    // @ Details section
    public $company, $default_page = "Mercado";
    
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

    // @ Teacher module
    public $teachers = [], $teacher_filter; 

    public function userIsTeacher($user_id) {
        $isTeacher = CompanyTeacher::where('company_id', $this->company->id)->where('user_id', $user_id)->first();

        if($isTeacher) {
            return true;
        } else {
            return false;
        }
    }

    public function toggleTeacher($user_id) {
        try {
            $isTeacher = CompanyTeacher::where('company_id', $this->company->id)->where('user_id', $user_id)->first();

            if($isTeacher) {
                $isTeacher->delete(); 
                toastr()->error("El usuario ya no es docente de la empresa.");
            } else {
                $teacher = new CompanyTeacher();
                $teacher->company_id = $this->company->id;
                $teacher->user_id = $user_id;
                $teacher->save();
                toastr()->success("El usuario ahora es docente de la empresa.");
            }
        } catch(\Throwable $th) {
            throw $th; 
            toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.");
        }
    }

    // @ Market module
    public $marketQuestions = [
        [
            "index" => "english_availability", 
            "title" => "Damos respuesta en inglés", 
            "description" => "Si marcas esta casilla, se indicará a las demás empresas que os podéis comunicar en Inglés en un proceso de compra/venta."
        ],
        [
            "index" => "vacations",
            "title" => "Estamos de vacaciones", 
            "description" => "Si marcas esta casilla, se indicará a las demás empresas que no podeis atender sus peticiones en este momento."
        ], 
        [
            "index" => "messages",
            "title" => "Mensajería unificada", 
            "description" => "Recibiréis todos los mensajes de sistema en el departamento de Recepción"
        ], 
        [
            "index" => "public_email",
            "title" => "Email público", 
            "description" => "Si marcas esta casilla, el email de notificaciones también será público al Market, y por lo tanto visible para el resto de empresas de la red."
        ]
    ]; 

    public function isQuestionMarket($index) {
        $question = CompanyMarket::where('company_id', $this->company->id)->where('index', $index)->first();

        if($question) {
            return true;
        } 

        return false; 
    }

    public function toggleMarketQuestion($index) {
        try {
            $question = CompanyMarket::where('company_id', $this->company->id)->where('index', $index)->first();

            if($question) {
                $question->delete(); 
                toastr()->error("La pregunta ha sido eliminada.");
            } else {
                $question = new CompanyMarket();
                $question->company_id = $this->company->id;
                $question->index = $index;
                $question->save();
                toastr()->success("La pregunta ha sido añadida.");
            }
        } catch(\Throwable $th) { 
            toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.");
        }
    }

    // @ Global render
    public function render() {
        $teacherRole = Role::where('name', 'Profesor')->first();

        if($teacherRole) {
            $this->teachers = User::where('center_id', $this->company->center_id)->where('name', 'LIKE', '%' . $this->teacher_filter . '%')->where('role_id', $teacherRole->id)->get();
        }

        return view('livewire.sections.authorized.teacher.single-company');
    }
}
