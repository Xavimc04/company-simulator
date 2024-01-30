<?php

namespace App\Livewire\Sections\Authorized\Market;
use Livewire\Component;
use App\Models\Company as CompanyModel;
use App\Models\Product;  

class Company extends Component {
    public $company, $filter, $category; 

    protected $products = [];

    public function mount($company) {
        $this->company = CompanyModel::where('name', str_replace('-', ' ', $company))->firstOrFail();
    }

    public function render() {
        if($this->company) {
            $queryBuilder = Product::query();

            if ($this->filter) {
                $queryBuilder->where('label', 'LIKE', '%' . $this->filter . '%');
            }

            if ($this->category) {
                $queryBuilder->where('category_id', $this->category);
            }

            $this->products = $queryBuilder->where('company_id', $this->company->id)->get();
        }

        return view('livewire.sections.authorized.market.company');
    }
}
