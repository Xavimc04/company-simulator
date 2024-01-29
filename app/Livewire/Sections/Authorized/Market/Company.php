<?php

namespace App\Livewire\Sections\Authorized\Market;
use Livewire\Component;
use App\Models\Company as CompanyModel;
use App\Models\Product;  

class Company extends Component {
    public $company; 

    public function mount($company) {
        $this->company = CompanyModel::where('name', str_replace('-', ' ', $company))->firstOrFail();
    }

    public function render() {
        return view('livewire.sections.authorized.market.company');
    }
}
