<?php

namespace App\Livewire\Admin\Charges\Branches;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule ;
use Livewire\Component;
use App\Models\Branch ;
use App\Models\City ;
class Create extends Component{
    public $data = [] ;
    public $loading = false ; 
    public $valueSelectCity = "la ville" , $searchSelect = ""; 
    public $id ;
    public $model = false , $typeModel = "create" ;

    protected $listeners = ["edit", "continue"] ;

    #[Computed]  
    public function cities(){
        return City::where('name', 'like', '%'. $this->searchSelect .'%')
                    ->orderBy('id', "DESC")->get();
    }
    public function edit(Branch $item) {
        $this->data = $item->toArray() ;
        $this->valueSelectCity = $item->city->name ;
        $this->id = $item->id ;
        $this->typeModel = "update" ;
        $this->model = true ;
    }
    public function update(Branch $item) {
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
        // dd($this->data);
        $this->validate() ;
        $this->handleKeyFilter();
        $created = Branch::create($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("app.success"));    
    }
    public function getValueSelect(City $item){
        $this->valueSelectCity = $item->name ;
    }
    public function rules(){
        return [
            'data.fr.name' => 'min:5',
        ];      
    }
    public function handleKeyFilter(){
        $this->filterData("name");
        $this->filterData("address");
        $this->filterData("phone");
        $this->filterData("city_id");
    }
    public function filterData($key){
        // $this->data[$key] = htmlspecialchars($this->data[$key]) ;
        $this->data[$key] = filter_var($this->data[$key], FILTER_SANITIZE_STRING) ;
        $this->data[$key] = strip_tags($this->data[$key]) ;
        return $this->data[$key] ;
    }
    public function mount() {
        $this->resetField();
    }
    public function resetField() {
        $this->data["name"] = "" ; 
        $this->data["address"] = "" ; 
        $this->data["phone"] = "" ; 
        $this->data["city_id"] = "" ; 
        $this->data['status'] = true ;
        $this->valueSelectCity = "la ville" ;
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
        return view('livewire.admin.charges.branches.create');
    }
}
