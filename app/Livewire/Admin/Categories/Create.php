<?php

namespace App\Livewire\Admin\Categories;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithFileUploads;
use Livewire\Component;
use Astrotomic\Translatable\Translatable;
use App\Models\Category ;
class Create extends Component
{
    use WithFileUploads ;
    public $data = [] , $image , $tag = "";
    public $tabs , $step = 1 , $loading = false ; 
    public $activeSubmit = false ;
    public $etaps , $id ;

    public $model = false , $typeModel = "create" ;
    protected $listeners = ["edit", "continue"] ;

    public function edit(Category $item) {
        $this->data["status"] = $item->status;
        $this->data["image"] = $item->image ;
        // $this->data = $item->toArray();
        foreach($item->translations as $translation){
            $this->data[$translation->locale] = $translation->toArray();
        }
        // dd($this->data);
        $this->id = $item->id ;
        $this->typeModel = "edit" ;
        $this->model = true ;
    }
    public function update(Category $item) {
        // $this->validate();
        $this->filterData();
        if ($this->image != "") {
            Storage::delete("public/".$this->data["image"]) ; 
            $this->data["image"] = $this->image->store('images/categories', "public"); 
        }
        $updated = $item->update($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    public function getModelCreate(){
        $this->typeModel = "create" ;
        $this->model = true ;
    }   
    public function create(){
        $this->validate() ;
        $this->data["image"] = $this->image->store('images/categories', "public");
        $creation = Category::create($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("app.success"));    
    }
    public function filterData(){
        // ====== filter field ===============
        $this->data["fr"]["name"] = filter_var($this->data["fr"]["name"], FILTER_SANITIZE_STRING);
        $this->data["fr"]["name"] = strip_tags($this->data["fr"]["name"]);
        $this->data["fr"]["name"] = htmlspecialchars($this->data["fr"]["name"]);
        $this->data["ar"]["name"] = filter_var($this->data["ar"]["name"], FILTER_SANITIZE_STRING);
        $this->data["ar"]["name"] = strip_tags($this->data["ar"]["name"]);
        $this->data["ar"]["name"] = htmlspecialchars($this->data["ar"]["name"]);
        $this->data["en"]["name"] = filter_var($this->data["en"]["name"], FILTER_SANITIZE_STRING);
        $this->data["en"]["name"] = strip_tags($this->data["en"]["name"]);
        $this->data["en"]["name"] = htmlspecialchars($this->data["en"]["name"]); 
        
        $this->data["fr"]["description"] = filter_var($this->data["fr"]["description"], FILTER_SANITIZE_STRING);
        $this->data["fr"]["description"] = strip_tags($this->data["fr"]["description"]);
        $this->data["fr"]["description"] = htmlspecialchars($this->data["fr"]["description"]);
        $this->data["ar"]["description"] = filter_var($this->data["ar"]["description"], FILTER_SANITIZE_STRING);
        $this->data["ar"]["description"] = strip_tags($this->data["ar"]["description"]);
        $this->data["ar"]["description"] = htmlspecialchars($this->data["ar"]["description"]);
        $this->data["en"]["description"] = filter_var($this->data["en"]["description"], FILTER_SANITIZE_STRING);
        $this->data["en"]["description"] = strip_tags($this->data["en"]["description"]);
        $this->data["en"]["description"] = htmlspecialchars($this->data["en"]["description"]); 
    }

    // =========================IMAGES===========================================
    public function removeImage () {
       $this->image  = "" ; 
    }
    // =========================IMAGES===========================================
    // =================================VALIDATION=================
    public function rules(){
        if ($this->step == 1) {
            return [
                'data.fr.name' => 'required|string|max:100|min:5',
                // 'data.fr.description' => 'required|string',
                // 'data.ar.name' => 'required|string|max:100|min:5',
                // 'data.ar.description' => 'required|string',
                // 'data.en.name' => 'required|string|max:100|min:5',
                // 'data.en.description' => 'required|string',
                // 'data.prix' => 'required|integer',
            ]; 
        }elseif($this->step == 2){
            return [
                'image' => 'required|image',
            ];
        }      
    }
    public function getValidation(){
        $rules = [] ;
        foreach($this->data as $lang => $fields){
            foreach ($fields as $field => $value) {
                $rules[$lang.'.'.$field] = 'required|string|max:100|min:5' ;
            }
        }
    }
    // =================================VALIDATION=================
    // =========================TABS===========================================
    public function changeTabs($local) {
        $this->tabs = $local ;
    } 
    public function next() {
        $validate = $this->validate() ;
        if($validate) {
            $this->loading = true ;
            $this->dispatch("setTimeout", time:"600");
            if($this->step <= count($this->etaps)) {
                $this->step = $this->step + 1 ;
            }  
        }   
    }
    public function continue(){
        $this->loading = false ;            
    }
    public function prev() {
        if($this->step > 1) {
            $this->step = $this->step - 1 ;
        }
    }
    // =========================TABS===========================================
    public function mount() {
        $this->data["fr"]["name"] = "" ;
        $this->data["fr"]["description"] = "" ;
        $this->data["ar"]["name"] = "" ;
        $this->data["ar"]["description"] = "" ;
        $this->data["en"]["name"] = "" ;
        $this->data["en"]["description"] = "" ;
        $this->data["status"] = false ;
        $this->data["image"]  = "" ;
        $this->image  = "" ;
        $this->tabs = app()->getLocale() ;
        $this->etaps = [
            0 => "1" ,
            1 => "2" ,
        ];
    }
    public function updated() {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function close(){
        $this->mount();
        $this->typeModel = "create" ;
        $this->activeSubmit = false ;
        $this->model = false ;
        $this->step = 1 ;
        $this->tabs = "fr" ;
    }
    public function render(){
        if ($this->step >= count($this->etaps)) {
            $this->activeSubmit = true ;
        }else {
            $this->activeSubmit = false ;
        }
        return view('livewire.admin.categories.create');
    }
}
