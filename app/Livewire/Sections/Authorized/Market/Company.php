<?php

namespace App\Livewire\Sections\Authorized\Market;
use Livewire\Component;
use App\Models\Company as CompanyModel;
use App\Models\Product;  
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use App\Models\CartProduct;

class Company extends Component {
    #[Url] 
    public $filter, $category;

    public $company, $selected_product, $selected_counter = 1; 

    protected $products = [];

    public function addToCart() {
        $onCart = CartProduct::where('user_id', auth()->user()->id)->where('product_id', $this->selected_product->id)->first(); 

        if(!$onCart) {
            CartProduct::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->selected_product->id,
                'amount' => $this->selected_counter
            ]);
        } else {
            $onCart->update([
                'amount' => $onCart->amount + $this->selected_counter
            ]);
        }

        toastr()->success('Producto añadido al carrito.');

        $this->reset(['selected_product', 'selected_counter']);
    }

    public function updatedSelectedProduct($value) {
        $this->selected_counter = 0;
    }

    public function mount($company, $product = false) {
        $this->company = CompanyModel::where('name', str_replace('-', ' ', $company))->firstOrFail();

        if($product) {
            $this->selected_product = Product::where('label', str_replace('-', ' ', $product))->firstOrFail();
        }
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
