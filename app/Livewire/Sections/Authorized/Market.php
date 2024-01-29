<?php

namespace App\Livewire\Sections\Authorized;
use Livewire\Component;
use App\Models\Product; 
use Livewire\WithPagination;

class Market extends Component {
    use WithPagination;

    public $product_filter, $sector;

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

        $this->products = $queryBuilder->get();
    
        return view('livewire.sections.authorized.market');
    }
}
