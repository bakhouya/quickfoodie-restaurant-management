<?php

namespace App\Livewire\Admin\Settings\Media;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule ;
use Livewire\WithFileUploads;
use App\Models\Media ;  
use Livewire\Component;
class Create extends Component{
    use WithFileUploads ;
    public $data = [] , $image = "";
    public $loading = false ; 
    public  $id ;
    public  $path =  'images/socialMedia' ;
    public $model = false , $typeModel = "create" ;

    protected $listeners = ["edit", "continue"] ;

    public function edit(Media $item) {
        $this->data = $item->toArray() ;
        $this->id = $item->id ;
        $this->typeModel = "update" ;
        $this->model = true ;
    }
    public function update(Media $item) {
        $this->filterData();
        if ($this->image != "") {
            if (Storage::exists("public/".$this->data["image"])) {
                Storage::delete("public/".$this->data["image"]) ; 
                $this->data["image"] = $this->image->store($this->path, "public"); 
            } 
        }
        $updated = $item->update($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated"));
    }
    public function getModelcreate(){
        $this->typeModel = "create" ;
        $this->model = true ;
    } 
    public function create(){
        $this->validate() ;
        $this->filterData();
        $this->data["image"] = $this->image->store($this->path, "public");
        $creation = Media::create($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("app.success"));    
    }
    // =========================IMAGES===========================================
    public function removeImage () {
    $this->image  = "" ; 
    }
    // =========================IMAGES===========================================
    public function rules(){
        return [
            'data.name' => 'required|string|unique:media,name,'.$this->id,
            'data.url' => 'required|url|unique:media,url,'.$this->id,
            // 'data.image' => 'required',
        ];      
    }
    public function filterData(){
        // ====== filter field ===============
        $this->data["name"] = filter_var($this->data["name"], FILTER_SANITIZE_STRING);
        $this->data["name"] = strip_tags($this->data["name"]);
        $this->data["name"] = htmlspecialchars($this->data["name"]);

        $this->data["url"] = filter_var($this->data["url"], FILTER_SANITIZE_STRING);
        $this->data["url"] = strip_tags($this->data["url"]);
        $this->data["url"] = htmlspecialchars($this->data["url"]);
    }
    public function mount() {
        $this->resetField();
    }
    public function resetField() {
        $this->data["name"] = "" ;
        $this->data["url"] = "" ;
        $this->data['status'] = true ;
        $this->data["image"]  = "" ;
        $this->image  = "" ;
    }
    public function updated() {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function close(){
        $this->resetField() ;
        $this->typeModel = "create" ;
        $this->model = false ;
    }

    public function render(){
        return view('livewire.admin.settings.media.create');
    }
}
