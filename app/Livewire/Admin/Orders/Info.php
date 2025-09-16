<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;

class Info extends Component{
    public $boxSelect = false , $delete = false , $tabs = 1;
    public $loading = false ;
    protected $listeners = ["continue"] ;
    public function getBoxSelect(){
        $this->boxSelect = true ;
    }
    public function getBoxDelete(){
        $this->delete = true ;
    }
    public function saveChange(){
        $this->boxSelect = false ;
        $this->dispatch('alert' , type: 'success', message: __("app.save_changes"));
    }
    public function forceDelete(){
        $this->delete = false ;
        $this->dispatch('alert' , type: 'success', message: __("app.save_changes"));
    }

    public function changeTabs($tabs){
        $this->loading = true ;
        $this->tabs = $tabs ;
        $this->dispatch("setTimeout", time:"600");           
    }
    public function continue(){
        $this->loading = false ;            
    }
    public function close(){
        $this->boxSelect = false ;
        $this->delete = false ;
    }
    public function dispatchClose(){
        $this->dispatch('close'); 
    }
    public function render(){
        return view('livewire.admin.orders.info');
    }
}
