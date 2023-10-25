<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use Livewire\Component;

class Companies extends Component {
    public $companyFilter, $creating;

    public function handleCreateModal() {
        $this->creating = true; 
    }

    public function render() {
        return view('livewire.sections.authorized.teacher.companies');
    }
}
