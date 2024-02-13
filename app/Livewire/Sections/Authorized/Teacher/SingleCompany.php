<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use App\Models\Company; 
use Livewire\WithFileUploads;
use App\Models\User; 
use Livewire\Component;
use App\Models\CompanyTeacher; 
use App\Models\Role; 
use App\Models\Wholesaler; 
use App\Models\CompanyMarket; 
use App\Models\CompanyWholesaler; 
use App\Models\CompanyEmployee; 

class SingleCompany extends Component {
    use WithFileUploads;

    // @ Main
    public $pages = [
        "Detalles", "Docentes", "Mercado", "Trabajadores", "Mayoristas"
    ];

    // @ Details section
    public $company, $default_page = "Detalles";
    
    public $social_denomination, $name, $image, $cif, $sector, $phone, $location, $cp, $city, $contact_email, $form_level, $status; 
    
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
        $this->status = $company->status;
    }

    public function save() {
        try {
            $this->validate([
                'social_denomination' => 'required|string|max:255',
                'name' => 'required|string|max:255'
            ]); 

            $this->company->social_denomination = $this->social_denomination;
            $this->company->name = str_replace(' ', '-', $this->name); 
            $this->company->cif = $this->cif;
            $this->company->sector = $this->sector;
            $this->company->phone = $this->phone;
            $this->company->location = $this->location;
            $this->company->cp = $this->cp;
            $this->company->city = $this->city;
            $this->company->contact_email = $this->contact_email;
            $this->company->form_level = $this->form_level;
            $this->company->status = $this->status;
            $this->company->save();
            toastr()->success('Los datos se han guardado correctamente', '¡Éxito!', '¡Éxito!');
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
    
            toastr()->success("¡El logo de la empresa ha sido actualizado!", '¡Éxito!');
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
                toastr()->success("El usuario ahora es docente de la empresa.", '¡Éxito!');
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
                toastr()->success("La pregunta ha sido añadida.", '¡Éxito!');
            }
        } catch(\Throwable $th) { 
            toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.");
        }
    }

    // @ Employees module
    protected $employees = [];
    public $employee_filter, $employee_modal, $employee_editing;
    public $employee_id, $employee_dept, $employee_boss;

    public function editEmployee($identifier) {
        $this->handleEmployeeModal();

        $employee = CompanyEmployee::find($identifier);

        
        if($employee) {
            $this->employee_editing = $identifier;
            $this->employee_id = $employee->user_id;
            $this->employee_dept = $employee->dept;
            $this->employee_boss = $employee->boss;
        }
    }

    public function hireEmployee($identifier) {
        CompanyEmployee::find($identifier)->delete();
    }

    public function handleEmployeeModal() {
        $this->employee_editing = false; 
        $this->employee_modal = !$this->employee_modal;

        if($this->employee_modal) {
            $this->employee_id = null;
            $this->employee_dept = null;
            $this->employee_boss = null;
        }
    }

    public function addEmployee() {
        $this->validate([
            'employee_id' => 'required|exists:users,id',
            'employee_dept' => 'required|string|max:255',
            'employee_boss' => 'required|max:255'
        ], [
            'employee_id.required' => 'Debes seleccionar un trabajador.',
            'employee_id.exists' => 'El trabajador seleccionado no existe.',
            'employee_dept.required' => 'Debes indicar el departamento del trabajador.',
            'employee_dept.string' => 'El departamento debe ser un texto.',
            'employee_dept.max' => 'El departamento no puede superar los 255 caracteres.',
            'employee_boss.required' => 'Debes indicar el jefe del trabajador.',
            'employee_boss.max' => 'El jefe no puede superar los 255 caracteres.'
        ]);

        if($this->employee_editing) {
            $employee = CompanyEmployee::find($this->employee_editing);

            if($employee) {
                $employee->user_id = $this->employee_id;
                $employee->dept = $this->employee_dept;
                $employee->boss = $this->employee_boss;
                $employee->save();

                toastr()->success("El trabajador ha sido actualizado.", '¡Éxito!');
                $this->handleEmployeeModal();
            } else {
                toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.");
            }

            return;
        }

        try {
            if(CompanyEmployee::where('company_id', $this->company->id)->where('user_id', $this->employee_id)->first()) {
                toastr()->error("El trabajador ya está añadido.");
                return;
            }

            CompanyEmployee::create([
                'company_id' => $this->company->id,
                'user_id' => $this->employee_id,
                'dept' => $this->employee_dept,
                'boss' => $this->employee_boss
            ]);

            toastr()->success("El trabajador ha sido añadido.");
            $this->handleEmployeeModal();
        } catch(\Throwable $th) { 
            throw $th;
            toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.");
        }
    }

    // @ Wholesalers module
    public $wholesaler_filter; 
    public $wholesalers = []; 

    public function isWholesalerAssigned($wholesaler) {
        $isWholesaler = CompanyWholesaler::where('company_id', $this->company->id)->where('wholesaler_id', $wholesaler)->first();

        if($isWholesaler) {
            return true;
        } 

        return false; 
    }

    public function toggleWholesaler($wholesaler_id) {
        try {
            $isWholesaler = CompanyWholesaler::where('company_id', $this->company->id)->where('wholesaler_id', $wholesaler_id)->first();

            if($isWholesaler) {
                $isWholesaler->delete(); 
                toastr()->error("El mayorista ya no está asignado a la empresa.");
            } else {
                $wholesaler = new CompanyWholesaler();
                $wholesaler->company_id = $this->company->id;
                $wholesaler->wholesaler_id = $wholesaler_id;
                $wholesaler->save();
                toastr()->success("El mayorista ha sido asignado a la empresa.", '¡Éxito!');
            }
        } catch(\Throwable $th) {
            throw $th;
            toastr()->error("¡Vaya! Algo salió mal. Inténtalo de nuevo más tarde.");
        }
    }

    // @ Global render
    public function render() {
        $teacherRole = Role::where('name', 'Profesor')->first();

        if($teacherRole) {
            $this->teachers = User::where('center_id', $this->company->center_id)->where('name', 'LIKE', '%' . $this->teacher_filter . '%')->where('role_id', $teacherRole->id)->get();
        }

        $this->employees = CompanyEmployee::where('company_id', $this->company->id)->whereRelation('user', 'name', 'like', '%' . $this->employee_filter . '%')->get();

        $this->wholesalers = Wholesaler::where('center_id', $this->company->center_id)->get(); 

        return view('livewire.sections.authorized.teacher.single-company');
    }
}
