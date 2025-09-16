<?php

namespace App\Livewire\Admin\Settings\Languages;

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\language ;
class Index extends Component{
    public $delete = false , $id , $loading= false ;
    public $search , $limit = 7 , $status ;

    // listeners
    protected $listeners = ["continue"] ;

    #[Computed]  
    public function languages(){
        return language::where('name', 'like', '%'. $this->search .'%')
                        ->orderBy('id', "asc")->limit($this->limit)->get(); 
    }
    public function addLimit(){ 
        if (language::all()->count() > $this->limit) {
            $this->loadLimit = true ;
            $this->dispatch("setTimeout", time:"200") ;
            $this->limit = $this->limit+7 ;
        } 
    }
    public function edit($item){
        $this->dispatch("edit", item:$item); 
    }
    public function handleChangeStatus(language $item){
        if ($item->status == false) {
            $item->update(["status" => true]) ; 
        } else {
            $item->update(["status" => false]) ; 
        } 
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    public function handleConfirmDelete(language $item){
        $this->delete = true ;
        $this->id = $item->id ;
    }
    public function forceDelete(){
        $item = language::where('id', $this->id)->first() ;
        if($item){
            $item->delete();
            $this->dispatch('alert' , type: 'success', message: __("message.deleted"));
        }  
    }



    public function continue(){
        ($this->loading = true) ? $this->loading = false : null ; 
        ($this->loadLimit = true) ? $this->loadLimit = false : null ;                  
    }
    public function close() {
        $this->delete = false ; 
    }
    public function render(){
        return view('livewire.admin.settings.languages.index');
    }
}
