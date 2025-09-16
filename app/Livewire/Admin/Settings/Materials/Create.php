<?php

namespace App\Livewire\Admin\Settings\Materials;
use Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithFileUploads;
use App\Helpers\langHelper ;
use Livewire\Component;
use App\Models\Material ;
class Create extends Component{
    use WithFileUploads ;
    public $data = [] , $image = "";
    public $tabs ,  $loading = false ; 
    public  $id ;
    public $model = false , $typeModel = "create" ;
    public  $path =  'images/materials' ;
    protected $listeners = ["edit", "continue"] ;


    public function edit(Material $item) {
        $this->data['status'] = $item->status ;
        $this->data['image'] = $item->image ;
        foreach($item->translations as $translation){
            $this->data[$translation->locale] = $translation->toArray();
        }
        $this->id = $item->id ;
        $this->typeModel = "update" ;
        $this->model = true ;
    }
    public function update(Material $item) {
        $this->filterData();
        if ($this->image != "") { 
            Storage::delete("public/".$this->data["image"]) ; 
            $this->data["image"] = $this->image->store($this->path, "public"); 
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
        $this->data["image"] = $this->image->store($this->path, "public"); //store file image in storage
        $created = Material::create($this->data) ;
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
            'data.fr.name' => 'min:5',
        ];      
    }
    public function filterData(){
        // ====== filter field ===============
        foreach (langHelper::getLanguages() as $key => $lang) {
            $this->data[$lang->locale]["name"] = filter_var($this->data[$lang->locale]["name"], FILTER_SANITIZE_STRING);
            $this->data[$lang->locale]["name"] = strip_tags($this->data[$lang->locale]["name"]);
            $this->data[$lang->locale]["name"] = htmlspecialchars($this->data[$lang->locale]["name"]);
        }
    }
    public function changeTabs($local) {
        $this->tabs = $local ;
    } 
    public function mount() {
        $this->tabs = app()->getLocale() ;
        $this->resetField();
    }
    public function resetField() {
        foreach (langHelper::getLanguages() as $key => $lang) {
            $this->data[$lang->locale]["name"] = "" ; 
        }
        $this->data['status'] = true ;
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
        return view('livewire.admin.settings.materials.create');
    }
}
