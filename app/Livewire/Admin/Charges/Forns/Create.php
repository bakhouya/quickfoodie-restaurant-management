<?php

namespace App\Livewire\Admin\Charges\Forns;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule ;
use Livewire\Component;
use App\Models\Asset ;
class Create extends Component{
    public $data = [] ;
    public $tabs ,  $loading = false ; 
    public  $id ;
    public $model = false , $typeModel = "create" ;

    protected $listeners = ["edit", "continue"] ;


    public function edit(Asset $item) {
        $this->data = $item->toArray() ;
        $this->id = $item->id ;
        $this->typeModel = "update" ;
        $this->model = true ;
    }
    public function update(Asset $item) {
        $this->handleKeyFilter();
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
        $this->handleKeyFilter();
        $created = Asset::create($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("app.success"));    
    }

    public function rules(){
        return [
            'data.fr.name' => 'min:5',
        ];      
    }
    public function handleKeyFilter(){
        $this->filterData("name") ;
        $this->filterData("address") ;
        $this->filterData("phone") ;
    }
    public function filterData($key){
        $this->data[$key] = filter_var($this->data[$key], FILTER_SANITIZE_STRING) ;
        $this->data[$key] = strip_tags($this->data[$key]) ;
        return $this->data[$key] ;
    }
    public function mount() {
        $this->tabs = app()->getLocale() ;
        $this->resetField();
    }
    public function resetField() {
        $this->data["name"] = "" ; 
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
        return view('livewire.admin.charges.forns.create');
    }
}
