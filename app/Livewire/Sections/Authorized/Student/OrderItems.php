<?php

namespace App\Livewire\Sections\Authorized\Student;
use Livewire\Component;
use App\Models\Order; 
use App\Models\OrderProduct;  
use App\Models\Company;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderItems extends Component {
    public $managing, $current_order, $order, $enableManage;

    public function downloadPdf($orderId) { 
        try {
            $order = Order::find($orderId);

            $total = 0;

            foreach (OrderProduct::where('order_id', $orderId)->get() as $product) {
                $total += $product['amount'] * $product->product->price; 
            }

            $imagePath = storage_path('app/public/companies/' . $order->seller['icon']);

            $sellerIconBase64 = $this->getBase64FromImage($imagePath);

            $pdf = PDF::loadView('pdf.order', [
                'order' => $order->toArray(), 
                'products' => OrderProduct::where('order_id', $orderId)->get(),
                'seller' => Company::find($order['seller_company_id']),
                'buyer' => Company::find($order['buyer_company_id']), 
                'total' => $total, 
                'icon' => $sellerIconBase64
            ])->setPaper('A4');

            return response()->streamDownload(function () use($pdf) {
                echo  $pdf->stream();
            }, 'Portal Empresarial - ' . $order['serial'] . '.pdf');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    
    public function manage($identifier) { 
        try {
            $this->managing = true;
            $this->current_order = Order::find($identifier);
        } catch (\Exception $e) {
            $this->managing = null;
        }
    }

    public function confirm() {
        try {
            $this->current_order->update(['status' => 'processed']);
            $this->managing = null;
        } catch (\Exception $e) {
            $this->managing = null;
        }
    }

    private function getBase64FromImage($imagePath) {
        $image = file_get_contents($imagePath);
        $base64 = base64_encode($image);

        return $base64;
    }

    public function mount($order, $enableManage = true) {
        $this->order = $order;
        $this->enableManage = $enableManage;
    }

    public function render() {
        return view('livewire.sections.authorized.student.order-items');
    }
}
