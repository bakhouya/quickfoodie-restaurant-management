<?php

namespace App\Livewire\Admin\Header;

use Livewire\Component;

class Header extends Component
{
    public $title = "" , $subTitle = "" ;

    
    public function render(){
        return view('livewire.admin.header.header');
    }
}
