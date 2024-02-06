<?php

namespace App\Livewire\Sections\Authorized\Market;
use Livewire\Component;
use App\Models\CartProduct; 
use App\Models\Product;
use App\Models\Company; 
use Livewire\Attributes\Url;

class ShoppingCart extends Component {
    protected $items = [], $companies = []; 

    public function deleteElement($id) {
        CartProduct::where('id', $id)->delete();
    }

    public function addOne($id) {
        $product = CartProduct::where('id', $id)->first();
        $product->amount += 1;
        $product->save();
    }

    public function removeOne($id) {
        $product = CartProduct::where('id', $id)->first();

        if(($product->amount - 1) == 0) {
            $product->delete();
            return;
        }

        $product->amount -= 1;
        $product->save();
    }
    
    public function render() {
        $this->items = CartProduct::where('user_id', auth()->user()->id)->get();
    
        $productIds = CartProduct::where('user_id', auth()->user()->id)->select('product_id')->pluck('product_id')->toArray(); 
        
        $this->companies = Company::whereIn('id', Product::whereIn('id', $productIds)->select('company_id')->pluck('company_id')->toArray())->get();
        
        return view('livewire.sections.authorized.market.shopping-cart');
    }
}
