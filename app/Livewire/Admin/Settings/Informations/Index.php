<?php

namespace App\Livewire\Admin\Settings\Informations;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule ;
use Livewire\WithFileUploads;
use Livewire\Component;
use App\Models\Information;
class Index extends Component{
    use WithFileUploads ;
    public $data = [] , $logo = "" , $icon = "", $tags = [], $tag ;
    public $loading = false ; 
    public  $id ;
    public  $path =  'images/settings' ;


    public function update(){
        $this->handleKeyFilter();
        $data = Information::first();
        if($data){
            $this->edit();
            $data->update($this->data);
        }else{
            $this->create();
        }
        $this->dispatch('alert' , type: 'success', message: __("message.updated"));
        $this->resetField();
    }
    public function edit(){
        if ($this->logo != "") {
            Storage::delete("public/".$this->data["image"]) ; 
            $this->data["image"] = $this->logo->store($this->path, "public"); 
        }
        if ($this->icon != "") {
            Storage::delete("public/".$this->data["icon"]) ; 
            $this->data["icon"] = $this->icon->store($this->path, "public"); 
        }
        if ($this->tags != "") {
            $this->data['tags'] = implode("|", $this->tags) ; 
        }
    }
    public function create(){
        $this->handleKeyFilter() ;
        if ($this->tags != "") {
            $this->data['tags'] = implode("|", $this->tags) ; 
        }
        $this->data["image"] = $this->logo->store($this->path, "public"); 
        $this->data["icon"] = $this->icon->store($this->path, "public"); 
        Information::create($this->data);
    }
    public function handleKeyFilter(){
        $this->filterData("name");
        $this->filterData("description");
        $this->filterData("seoName");
        $this->filterData("seoDescription");
    }
    public function filterData($key){
        // $this->data[$key] = htmlspecialchars($this->data[$key]) ;
        $this->data[$key] = filter_var($this->data[$key], FILTER_SANITIZE_STRING) ;
        $this->data[$key] = strip_tags($this->data[$key]) ;
        return $this->data[$key] ;
    }
    // =========================TAGS===========================================
    public function addTags() {
        if ($this->tag != "" && $this->tag != null) {
            if(!in_array($this->tag, $this->tags)){
                array_push($this->tags, $this->tag);
            }
            $this->tag = "" ;
        }else {
            $this->dispatch('alert' , type: 'error', message: "entrer some caractres sur field tags");
        }    
    }
    public function removeTagInArray ($key) {
        unset($this->tags[$key]) ;
        $this->tags = array_values($this->tags) ;   
    }
    // =========================TAGS===========================================
    public function mount(){
        $data = Information::first();
        $this->data = $data->toArray();
        // dd($this->data);
        if ($this->data["tags"] != "text") {
            $this->tags = explode('|', $data->tags);
        }
        
    }
    public function resetField(){
        $this->logo = "" ;
        $this->icon = "" ;
    }
    public function render(){
        return view('livewire.admin.settings.informations.index');
    }
}
