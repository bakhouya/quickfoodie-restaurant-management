<?php

namespace App\Livewire\Admin\Sidbar;

use Livewire\Component;

class Sidbar extends Component{
    public $navbars = [] ;
    public function mount () {
        return $this->navbars = [  
            ["id" => 1 , "to" => "" , "text" => __('app.dashboard'), "icon" => "fi-rs-home"] ,

            ["id" => 2 , "to" => "" , "text" => __('app.tables'), "icon" => "fi-rs-graphic-tablet"] ,

            ["id" => 3 , "to" => Route("orders") , "text" => __('app.orders'), "icon" => "fi-rs-shopping-bag"] ,
            
            ["id" => 4 , "to" => Route("categories") , "text" => __('nav.menu_categories'), "icon" => "fi-rs-flame"] ,
            ["id" => 4 , "to" => Route("articles") , "text" => __('nav.menu_items'), "icon" => "fi-rs-shopping-bag"] ,
            ["id" => 4 , "to" => Route("users") , "text" => __('nav.staff'), "icon" => "fi-rs-users"] ,
            ["id" => 4 , "to" => "" , "text" => __('nav.raports'), "icon" => "fi-rs-stopwatch"] ,
            ["id" => 4 , "to" => "" , "text" => __('nav.sales'), "icon" => "fi-rs-scale"] ,
            ["id" => 4 , "to" => "" , "text" => __('nav.invocies'), "icon" => "fi-rs-book-alt"] ,
            ["id" => 3 , "to" => Route("settings") , "text" => __('nav.settings'), "icon" => "fi-rs-settings"] ,   
        ];
    }
    public function render(){
        return view('livewire.admin.sidbar.sidbar');
    }
}
