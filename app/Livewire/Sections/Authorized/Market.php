<?php

namespace App\Livewire\Sections\Authorized;

use Livewire\Component;
use App\Models\Product; 
use App\Models\Company; 
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class Market extends Component {
    use WithPagination;

    #[Url] 
    public $product_filter, $sector, $company;

    protected $companiesList = [];

    public $marketQuestions = [
        [
            "index" => "english_availability", 
            "title" => "Damos respuesta en inglés", 
        ],
        [
            "index" => "vacations",
            "title" => "Estamos de vacaciones", 
        ], 
        [
            "index" => "messages",
            "title" => "Mensajería unificada", 
        ], 
        [
            "index" => "public_email",
            "title" => "Email público", 
        ]
    ]; 

    protected $products = []; 

    public function render() {
        $queryBuilder = Product::query();

        if ($this->product_filter) {
            $queryBuilder->where('label', 'LIKE', '%' . $this->product_filter . '%');
        }

        if ($this->sector) {
            $queryBuilder->whereHas('company', function ($query) {
                $query->where('sector', $this->sector);
            });
        }

        $queryBuilder->whereHas('company', function ($query) {
            $query->where('status', 'active');
        });

        if ($this->company) {
            $queryBuilder->where('company_id', (int) $this->company);
        }

        $this->products = $queryBuilder->get();

        $this->companiesList = Company::where('status', 'active')
            ->select('id', 'name')
            ->get();
    
        return view('livewire.sections.authorized.market');
    }
}
