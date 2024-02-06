<?php

namespace App\Livewire\Sections\Authorized\Market;
use Livewire\Component;
use App\Models\CartProduct; 
use App\Models\Product;
use App\Models\Company; 
use App\Models\Order; 
use App\Models\OrderProduct; 
use Livewire\Attributes\Url;

class ShoppingCart extends Component {
    public $items = [], $companies = []; 

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

    public function checkout() {
        try {
            foreach ($this->companies as $key => $value) {
                $order = Order::create([
                    'serial' => 'ORD' . $value->id . auth()->user()->id . time(),
                    'user_id' => auth()->user()->id,
                    'buyer_company_id' => auth()->user()->current_company,
                    'seller_company_id' => $value->id
                ]);

                foreach ($this->items as $item) {
                    if ($item->product->company_id == $value->id) {
                        OrderProduct::create([
                            'order_id' => $order->id,
                            'product_id' => $item->product_id,
                            'amount' => $item->amount
                        ]);

                        CartProduct::where('id', $item->id)->delete();
                    }
                }

                toastr()->success("Orden procesada con éxito: " . $order->serial);
            }
        } catch (\Throwable $th) {
            toastr()->error("Ocurrió un error al procesar la orden");
        }
    }
    
    public function render() {
        $this->items = CartProduct::where('user_id', auth()->user()->id)->get();
    
        $productIds = CartProduct::where('user_id', auth()->user()->id)->select('product_id')->pluck('product_id')->toArray(); 
        
        $this->companies = Company::whereIn('id', Product::whereIn('id', $productIds)->select('company_id')->pluck('company_id')->toArray())->get();
        
        return view('livewire.sections.authorized.market.shopping-cart');
    }
}
