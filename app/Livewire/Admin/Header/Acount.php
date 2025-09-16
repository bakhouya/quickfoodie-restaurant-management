<?php

namespace App\Livewire\Admin\Header;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Acount extends Component{
    public $box = false , $step = 1 ;

    public function showBox(){
        if ($this->box == true) {
            $this->box = false ;
        } else {
            $this->box = true ;
        }
    }
    public function settings(){
        $this->step = 2 ;
    }
    public function closeStep() {
        $this->step = 1 ;
    }
    public function changeMode($mode) {
        $this->dispatch('changeMode' , mode: $mode);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function render(){
        return view('livewire.admin.header.acount') ;
    }
}
