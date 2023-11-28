<?php

namespace App\Livewire\Sections\Authorized\Admin;
use Livewire\Component;
use App\Models\Announcement;
use Livewire\WithPagination;

class Announcements extends Component {
    use WithPagination;

    protected $announcements = []; 

    public $creating, $filter, $statusFilter; 
    public $title, $content, $level, $fixed; 

    public $states = [
        "draft" => "Borrador", 
        "published" => "Publicado",
        "archived" => "Archivado",
    ]; 

    public $levels = [
        0 => "Baja", 
        1 => "Media",
        2 => "Alta",
    ];

    public function restoreParams() {
        $this->reset([
            "title", 
            "content",  
            "level", 
            "fixed", 
        ]);
    }

    public function setState($announce_id, $state) {
        $announce = Announcement::find($announce_id); 

        if($announce) {
            $announce->status = $state; 
            $announce->save(); 
        }
    } 

    public function toggleFix($announce_id) {
        $announce = Announcement::find($announce_id); 

        if($announce) {
            $announce->fixed = !$announce->fixed; 
            $announce->save(); 
        }
    }

    public function openModal() {
        $this->restoreParams(); 
        $this->creating = true; 
    }

    public function create($status) {
        if(!$status) return; 

        $this->validate([
            "title" => "required|string|max:50", 
            "content" => "required|string",  
            "level" => "required|integer"
        ], [
            "title.required" => "El título es requerido", 
            "title.string" => "El título debe ser una cadena de texto", 
            "title.max" => "El título no debe exceder los 50 caracteres", 
            "content.required" => "El contenido es requerido", 
            "content.string" => "El contenido debe ser una cadena de texto",  
            "level.required" => "El nivel es requerido", 
            "level.integer" => "El nivel debe ser un número entero"
        ]);

        try {
            $created = Announcement::create([
                "title" => $this->title, 
                "user_id" => auth()->user()->id,
                "content" => $this->content, 
                "status" => $status,  
                "level" => $this->level, 
                "fixed" => 0 
            ]);

            if($created) {
                toastr()->success("Anuncio creado correctamente");
                $this->creating = false; 
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function render() {
        $query = Announcement::query();

        if($this->filter) {
            $query->where('title', 'like', '%' . $this->filter . '%');
        }

        if($this->statusFilter) {
            $query->where('status', $this->statusFilter);
        }

        $this->announcements = $query->orderBy('updated_at', 'DESC')->paginate(10);

        return view('livewire.sections.authorized.admin.announcements');
    }
}
