<?php

namespace App\Livewire\Sections\Authorized\Student\Sells;
use Livewire\Component;
use App\Models\Product; 
use App\Models\ProductCategory;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Products extends Component {
    use WithFileUploads, WithPagination;

    public $creating, $editing, $filter, $selected_categories = [], $filter_categories_ids = [];
    
    public $creating_category, $category_name, $label, $price, $reference, $category, $image, $status = 'active', $description; 

    protected $categories = []; 

    public function openRegister() {
        $this->creating = true;
        $this->editing = false; 
        $this->reset(['category', 'price', 'label', 'reference', 'image', 'status', 'description']);
    }

    public function edit($id) {
        $this->editing = $id;
        $this->creating = true; 

        $product = Product::find($id);

        $this->category = $product->category_id;
        $this->price = $product->price;
        $this->label = $product->label;
        $this->reference = $product->reference;
        $this->status = $product->status;
        $this->description = $product->description;
    }

    public function storeProduct() {
        $this->validate([
            'category' => 'required|integer|exists:product_categories,id',
            'price' => 'required|numeric|min:1',
            'reference' => 'required|string|min:3',
            'label' => 'required|string|min:3|max:40',
            'description' => 'nullable|string|min:3|max:255',
        ], [
            'category.required' => 'La categoría es requerida.',
            'category.integer' => 'La categoría debe ser un número entero.',
            'category.exists' => 'La categoría no existe.',
            'price.required' => 'El precio es requerido.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio debe ser mínimo 1.',
            'reference.required' => 'La referencia es requerida.',
            'reference.string' => 'La referencia debe ser un texto.',
            'reference.min' => 'La referencia debe tener mínimo 3 caracteres.',
            'reference.max' => 'La referencia debe tener máximo 40 caracteres.',
            'label.required' => 'El nombre del producto es requerido.',
            'label.string' => 'El nombre del producto debe ser un texto.',
            'label.min' => 'El nombre del producto debe tener mínimo 3 caracteres.',
            'label.max' => 'El nombre del producto debe tener máximo 40 caracteres.',
            'description.string' => 'La descripción del producto debe ser un texto.',
            'description.min' => 'La descripción del producto debe tener mínimo 3 caracteres.',
            'description.max' => 'La descripción del producto debe tener máximo 255 caracteres.'
        ]);

        try {
            if($this->image) {
                $this->image->store("companies/" . auth()->user()->current_company . "/products", 'public');
            }

            if($this->editing) {
                $product = Product::find($this->editing);

                $product->update([
                    'category_id' => $this->category,
                    'label' => $this->label,
                    'price' => $this->price,
                    'reference' => $this->reference,
                    'status' => $this->status,
                    'description' => $this->description
                ]);

                if($this->image) {
                    $product->update([
                        'image' => $this->image->hashName()
                    ]);
                }

                toastr()->success('¡Producto actualizado con éxito!');
            } else {
                $product = Product::create([
                    'category_id' => $this->category,
                    'label' => $this->label,
                    'price' => $this->price,
                    'reference' => $this->reference,
                    'company_id' => auth()->user()->current_company,
                    'status' => $this->status,
                    'description' => $this->description
                ]);

                if($this->image) {
                    $product->update([
                        'image' => $this->image->hashName()
                    ]);
                }

                toastr()->success('¡Producto creado con éxito!');
            }

            $this->creating = false;
            $this->editing = false;
            $this->reset(['category', 'price', 'label', 'reference', 'image', 'status', 'description']); 
        } catch (\Throwable $th) {
            toastr()->error('¡Ha ocurrido un error al crear el producto!');
        }
    }

    public function updatedSelectedCategories() {
        $this->resetPage();

        $this->filter_categories_ids = [];

        foreach ($this->selected_categories as $key => $value) {
            if($value === true) {
                array_push($this->filter_categories_ids, $key);
            }
        }
    }

    public function updatedFilter() {
        $this->resetPage();
    }

    public function openCreateCategory() {
        $this->creating_category = true;
        $this->reset(['category_name']);
    }

    public function createCategory() {
        $this->validate([
            'category_name' => 'required|string|min:3|max:40'
        ], [
            'category_name.required' => 'El nombre de la categoría es requerido.',
            'category_name.string' => 'El nombre de la categoría debe ser un texto.',
            'category_name.min' => 'El nombre de la categoría debe tener al menos 3 caracteres.',
            'category_name.max' => 'El nombre de la categoría debe tener máximo 40 caracteres.'
        ]);

        try {
            ProductCategory::create([
                'label' => $this->category_name, 
                'company_id' => auth()->user()->current_company
            ]);
    
            $this->creating_category = false;
            $this->reset(['category_name']);
    
            toastr()->success('¡Categoría creada con éxito!');
        } catch (\Throwable $th) {
            toastr()->error('¡Ha ocurrido un error al crear la categoría!');
        }
    }

    public function render() {
        $this->categories = ProductCategory::where('company_id', auth()->user()->current_company)->get(); 

        $query = Product::query();

        if ($this->filter) {
            $query->where('label', 'like', '%' . $this->filter . '%');
        }

        if (count($this->filter_categories_ids) > 0) {
            $query->whereIn('category_id', $this->filter_categories_ids);
        }

        $this->products = $query->where('company_id', auth()->user()->current_company)->orderBy('id')->paginate(10);

        return view('livewire.sections.authorized.student.sells.products');
    }
}
