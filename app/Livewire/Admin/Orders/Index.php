<?php

namespace App\Livewire\Admin\Orders;

use Livewire\Component;

class Index extends Component{
    public $infOrder = false , $tabs = 1;
    public $loading = false ;
    protected $listeners = ["close", "continue"] ;


    public function changeStatus(){
        $this->dispatch('alert' , type: 'success', message: __("app.save_changes"));
    }
    public function getInfOrder($item){
        $this->infOrder = true ;
    }
    public function changeTabs($tabs){
        $this->loading = true ;
        $this->tabs = $tabs ;
        $this->dispatch("setTimeout", time:"600");           
    }
    public function continue(){
        $this->loading = false ;            
    }
    public function updateFilter(){
        $this->loading = true ;
        $this->dispatch("setTimeout", time:"600");
    }
    public function close(){
        $this->infOrder = false ;
    }
    public function render(){
        return view('livewire.admin.orders.index');
    }
}
