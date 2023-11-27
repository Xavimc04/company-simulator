<?php

namespace App\Livewire\Sections\Authorized\Teacher;
use Livewire\Component;
use App\Models\Wholesaler; 
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Wholesalers extends Component {
    use WithPagination, WithFileUploads;

    public $filter, $modal, $editing; 
    protected $wholesalers = [];

    public $name, $cif, $social_denomination, $image, $transport = 0, $location, $city, $icon, $disccount = 0, $payment_days = 7, $country = "España", $tax = 0;

    public function restoreParams() {
        $this->editing = false; 
        $this->reset(['name', 'cif', 'image', 'social_denomination', 'transport', 'location', 'city', 'icon', 'disccount', 'payment_days', 'country', 'tax']);
    }

    public function handleCreateModal() {
        $this->restoreParams();
        $this->modal = true;
    }

    public function edit($wholesaler) {
        $this->restoreParams();
        $this->modal = true;

        $current = Wholesaler::find($wholesaler);

        if($current) {
            $this->editing = $current->id;
            $this->name = $current->name;
            $this->cif = $current->cif;
            $this->social_denomination = $current->social_denomination;
            $this->transport = $current->transport;
            $this->image = $current->icon;
            $this->location = $current->location;
            $this->city = $current->city;
            $this->icon = $current->icon;
            $this->disccount = $current->disccount;
            $this->payment_days = $current->payment_days;
            $this->country = $current->country;
            $this->tax = $current->tax;
        }
    }

    protected $rules = [
        'name' => 'required|string|min:3|max:255',
        'cif' => 'required|string|min:3|max:255',
        'social_denomination' => 'required|string|min:3|max:255',
        'transport' => 'required|numeric|min:0|max:9999999999',
        'location' => 'required|string|min:3|max:255',
        'city' => 'required|string|min:3|max:255', 
        'disccount' => 'required|numeric|min:0|max:9999999999',
        'payment_days' => 'required|numeric|min:0|max:9999999999',
        'country' => 'required|string|min:3|max:255',
        'image' => 'nullable|image|max:1024',
    ]; 

    protected $messages = [
        'name.required' => 'El campo nombre es requerido.',
        'name.string' => 'El campo nombre debe ser una cadena de texto.',
        'name.min' => 'El campo nombre debe tener al menos 3 caracteres.',
        'name.max' => 'El campo nombre no debe exceder los 255 caracteres.',
        'cif.required' => 'El campo cif es requerido.',
        'cif.string' => 'El campo cif debe ser una cadena de texto.',
        'cif.min' => 'El campo cif debe tener al menos 3 caracteres.',
        'cif.max' => 'El campo cif no debe exceder los 255 caracteres.',
        'social_denomination.required' => 'El campo denominación social es requerido.',
        'social_denomination.string' => 'El campo denominación social debe ser una cadena de texto.',
        'social_denomination.min' => 'El campo denominación social debe tener al menos 3 caracteres.',
        'social_denomination.max' => 'El campo denominación social no debe exceder los 255 caracteres.',
        'transport.required' => 'El campo transporte es requerido.',
        'transport.numeric' => 'El campo transporte debe ser un número.',
        'transport.min' => 'El campo transporte debe ser mayor o igual a 0.',
        'transport.max' => 'El campo transporte no debe exceder los 9999999999.',
        'location.required' => 'El campo localización es requerido.',
        'location.string' => 'El campo localización debe ser una cadena de texto.',
        'location.min' => 'El campo localización debe tener al menos 3 caracteres.',
        'location.max' => 'El campo localización no debe exceder los 255 caracteres.',
        'city.required' => 'El campo ciudad es requerido.',
        'city.string' => 'El campo ciudad debe ser una cadena de texto.',
        'city.min' => 'El campo ciudad debe tener al menos 3 caracteres.',
        'city.max' => 'El campo ciudad no debe exceder los 255 caracteres.',
        'disccount.required' => 'El campo descuento es requerido.',
        'disccount.numeric' => 'El campo descuento debe ser un número.',
        'disccount.min' => 'El campo descuento debe ser mayor o igual a 0.',
        'disccount.max' => 'El campo descuento no debe exceder los 9999999999.',
        'payment_days.required' => 'El campo días de pago es requerido.',
        'payment_days.numeric' => 'El campo días de pago debe ser un número.',
        'payment_days.min' => 'El campo días de pago debe ser mayor o igual a 0.',
        'payment_days.max' => 'El campo días de pago no debe exceder los 9999999999.',
        'tax.required' => 'El campo impuesto es requerido.',
        'tax.numeric' => 'El campo impuesto debe ser un número.',
        'tax.min' => 'El campo impuesto debe ser mayor o igual a 0.',
        'tax.max' => 'El campo impuesto no debe exceder los 9999999999.'
    ]; 

    public function saveForm() {
        $this->validate(); 

        try {
            $this->image->store('wholesalers', 'public');

            if($this->editing) {
                $wholesaler = Wholesaler::find($this->editing);
    
                if($wholesaler) {
                    $wholesaler->update([
                        'name' => $this->name,
                        'cif' => $this->cif,
                        'social_denomination' => $this->social_denomination,
                        'transport' => $this->transport,
                        'location' => $this->location,
                        'city' => $this->city,
                        'disccount' => $this->disccount,
                        'icon' => $this->image->hashName(),
                        'payment_days' => $this->payment_days,
                        'country' => $this->country,
                        'tax' => $this->tax,
                    ]); 

                    if($wholesaler) {
                        toastr()->success("El mayorista {$wholesaler->name} se ha actualizado correctamente.");
                        $this->restoreParams();
                        $this->modal = false;
                    } else {
                        toastr()->error("Ha ocurrido un error al intentar actualizar el mayorista {$wholesaler->name}.");
                    }
                } else {
                    toastr()->error("Ha ocurrido un error al intentar actualizar el mayorista {$wholesaler->name}.");
                }

                return; 
            }

            $wholesaler = Wholesaler::create([
                'center_id' => auth()->user()->center_id,
                'name' => $this->name,
                'cif' => $this->cif,
                'social_denomination' => $this->social_denomination,
                'transport' => $this->transport,
                'location' => $this->location,
                'city' => $this->city,
                'icon' => $this->image->hashName(),
                'disccount' => $this->disccount,
                'payment_days' => $this->payment_days,
                'country' => $this->country,
                'tax' => $this->tax,
            ]); 
    
            if($wholesaler) {
                toastr()->success("El mayorista {$wholesaler->name} se ha creado correctamente.");
                $this->restoreParams();
                $this->modal = false;
            } else {
                toastr()->error("Ha ocurrido un error al intentar crear el mayorista {$wholesaler->name}.");
            }
        } catch (\Throwable $th) { 
            toastr()->error("Ha ocurrido un error al intentar crear el mayorista {$wholesaler->name}.");
        }
    }

    public function render() {
        $this->wholesalers = Wholesaler::where('center_id', auth()->user()->center_id)->where('name', 'like', '%' . $this->filter . '%')->orderBy('id')->paginate(10);

        return view('livewire.sections.authorized.teacher.wholesalers');
    }
}
