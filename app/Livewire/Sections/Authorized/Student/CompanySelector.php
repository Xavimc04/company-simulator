<?php

namespace App\Livewire\Sections\Authorized\Student;
use App\Models\CompanyEmployee;
use Livewire\Component;

class CompanySelector extends Component {  
    public $companies = [], $switching, $selected_company; 

    public function mount() {
        $this->companies = auth()->user()->companies;

        // @ Validate is hired 
        $onJob = CompanyEmployee::where('user_id', auth()->user()->id)->where('company_id', auth()->user()->current_company)->first();

        if(!$onJob) {
            auth()->user()->update(['current_company' => null]);
        }

        $this->selected_company = auth()->user()->current_company;
    }

    public function updatedSwitching() {
        if($this->switching) {
            $this->selected_company = auth()->user()->current_company;
        }
    }

    public function confirm() { 
        if($this->selected_company) {
            $canJoin = CompanyEmployee::where('company_id', $this->selected_company)->where('user_id', auth()->user()->id)->first();

            if($canJoin) {
                auth()->user()->update(['current_company' => $this->selected_company]);
            }
        }

        $this->switching = false; 
    }

    public function render() {
        return view('livewire.sections.authorized.student.company-selector');
    }
}
