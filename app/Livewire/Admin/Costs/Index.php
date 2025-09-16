<?php

namespace App\Livewire\Admin\Costs;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\Component;
use App\Models\Material ;
use App\Models\Asset ;
class Index extends Component{
    public $asset ;
    public $model = false , $select = false , $typeModel ;
    public $costs = [] , $data = [] , $materials , $cost = [];
    public $id ;


    public function selectFor(){
        $this->select = true ;
    }
    public function saveChange(){
        $this->data = Asset::where('id', $this->asset)->first()->toArray() ;
        $this->materials = Asset::find($this->asset)->materials ;
        $this->close();
        // ->materials 
    }
    public function getModelAddCost(Material $item){
        $this->model = true ;
        $this->typeModel = 'create' ;
        $this->id = $item ; //$this->cost
    }
    public function create(){
        // dd($this->id);
        $this->costs[] = [
            "key" => $this->id->id,
            "name" => $this->id->name,
            "price" => $this->cost["price"],
            "quantity" => $this->cost["quantity"],
            "total" => $this->cost["total"],
        ] ;
        $this->close() ;
    }
    #[Computed]  
    public function assets(){
        return Asset::orderBy('id', "DESC")->get() ;
    }


    public function close(){
        $this->select = false ;
        $this->model = false ;
    }
    public function render(){
        return view('livewire.admin.costs.index', [
            'materials' => $this->materials ,
            "costs"=>$this->costs,
        ]);
    }
}
