<?php

namespace App\Livewire\Admin\Categories;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithPagination ;
use Livewire\Component;
use Illuminate\Support\Facades\App;
use App\Models\Category ;

class Index extends Component{
    use WithPagination;
    public $delete = false , $id , $tabs = 1, $loading= false , $selection = false ;
    public $listSelect = [] ;
    public $search , $limit = 7 , $status ;

    // filter
    public $filterStatus = "" , $orderBy = "ASC";

    // listeners
    protected $listeners = ["continue"] ;
    
    #[Computed]  
    public function categories(){
        return Category::whereHas("translations", function($query){
            $query->where('name', 'like', '%'. $this->search .'%');
            $query->orWhere('description', 'like', '%'. $this->search .'%');
        })->when($this->filterStatus, function($query){
            return $query->where('status', $this->filterStatus);
        })->orderBy('id', $this->orderBy)->paginate(6); 
    }
    public function edit($item){
        $this->dispatch("edit", item:$item); 
    }
    public function selectThisItem($id) {
        
        if(!in_array($id, $this->listSelect)){
            array_push($this->listSelect, $id) ;
        }else {
            $this->listSelect = array_filter($this->listSelect, function($value) use ($id){
                return $value !== $id ;
            });
        }
    }
    public function updatedSearch(){
        $this->resetPage() ;
    }
    public function emptySelection(){
        $this->listSelect = [] ;
        $this->selection = false ;
    } 
    public function activeCheckSelect(){
        $this->selection = true ;
    }
    public function closeCheckSelect(){
        $this->selection = false ;
    }
    public function closeSelection(){
        $this->selection = false ;
        $this->listSelect = [] ;
    }
    // ==================================action selection==============================
    public function handleConfirmDeleteAll(){
        $this->delete = true ;
    }
    public function handleChangeStatusAll(){
        $users = Category::whereIn("id", $this->listSelect)->get() ;
        foreach ($users as $key => $user) {
            if ($user->status == false) {
                $user->update(["status" => true]) ; 
            } else {
                $user->update(["status" => false]) ; 
            }            
        }
        $this->closeSelection() ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    // ==================================action selection==============================
    public function forceDelete() {
        $users = Category::whereIn("id", $this->listSelect)->get() ;
        foreach ($users as $key => $user) {
                $user->delete();     
        }
        if($this->selection) {
            $this->closeSelection();
        }
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.deleted")); 
    }
    public function addLimit(){ 
        if (Category::all()->count() > $this->limit) {
            $this->loadLimit = true ;
            $this->dispatch("setTimeout", time:"200") ;
            $this->limit = $this->limit+7 ;
        } 
    }
    public function changeTabs($tabs){
        $this->loading = true ;
        $this->tabs = $tabs ;
        $this->dispatch("setTimeout", time:"600");           
    }
    public function continue(){
        ($this->loading = true) ? $this->loading = false : null ; 
        ($this->loadLimit = true) ? $this->loadLimit = false : null ;                  
    }
    public function updateFilter(){
        $this->loading = true ;
        $this->dispatch("setTimeout", time:"200");
    }
    public function close() {
        $this->delete = false ; 
    }
    public function render(){
        return view('livewire.admin.categories.index');
    }
}
