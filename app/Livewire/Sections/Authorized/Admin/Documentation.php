<?php

namespace App\Livewire\Sections\Authorized\Admin;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class Documentation extends Component {
    public $directory = "", $folders = [], $files = [];

    public $creatingFolder, $folderName;
    public $creatingFile, $fileName;

    public function addDirectory($string) {
        $this->directory = $this->directory . '/' . $string;
    }

    public function setDirectory($string) {
        if(!$string) {
            $this->directory = "";
            return;
        }

        if($string == 'Inicio') {
            $this->directory = "";
            return;
        }

        $this->directory = $string;
    }
    
    public function updatedCreatingFolder() {
        $this->reset(['folderName']);
    }

    public function updatedCreatingFile() {
        $this->reset(['fileName']);
    }

    public function createFolder() {
        $this->validate([
            'folderName' => 'required|min:3|max:30'
        ], [
            'folderName.required' => 'El nombre de la carpeta es requerido.',
            'folderName.min' => 'El nombre de la carpeta debe tener al menos 3 caracteres.',
            'folderName.max' => 'El nombre de la carpeta debe tener máximo 30 caracteres.'
        ]);

        Storage::makeDirectory("documentation/" . $this->directory . '/' . $this->folderName);

        $this->reset(['creatingFolder', 'folderName']);
    }

    public function createFile() {
        $this->validate([
            'fileName' => 'required|min:3|max:30'
        ], [
            'fileName.required' => 'El nombre del archivo es requerido.',
            'fileName.min' => 'El nombre del archivo debe tener al menos 3 caracteres.',
            'fileName.max' => 'El nombre del archivo debe tener máximo 30 caracteres.'
        ]);

        Storage::put("documentation/" . $this->directory . '/' . $this->fileName . ".md", "");

        $this->reset(['creatingFile', 'fileName']);
    }

    public function render() {
        $this->folders = Storage::directories("documentation/" . $this->directory);
        $this->files = Storage::files("documentation/" . $this->directory);

        return view('livewire.sections.authorized.admin.documentation');
    }
}
