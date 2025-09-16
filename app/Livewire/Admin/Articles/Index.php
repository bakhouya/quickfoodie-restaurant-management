<?php

namespace App\Livewire\Admin\Articles;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use App\Models\Meal ;
use Livewire\Component;

class Index extends Component{
    
    public $delete = false , $id , $tabs = 1, $loading= false , $selection = false ;
    public $listSelect = [] ;
    public $search , $limit = 7 , $status ;

    // filter
    public $filterStatus = "" , $orderBy = "ASC";

    // listeners
    protected $listeners = ["continue"] ;

    
    #[Computed]  
    public function meals(){
        return Meal::whereHas("translations", function($query){
            $query->where('name', 'like', '%'. $this->search .'%');
            $query->orWhere('description', 'like', '%'. $this->search .'%');
        })->when($this->filterStatus, function($query){
            return $query->where('status', $this->filterStatus);
        })->orderBy('id', $this->orderBy)->limit($this->limit)->get(); 
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
        // dd($this->delete);
    }
    public function handleChangeStatusAll(){
        $users = Meal::whereIn("id", $this->listSelect)->get() ;
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
        $items = Meal::whereIn("id", $this->listSelect)->get() ;
        foreach ($items as $key => $item) {
                foreach($item->images as $image){
                    Storage::delete("public/".$image->image) ; 
                    $image->delete();
                }
                $item->delete();     
        }
        if($this->selection) {
            $this->closeSelection();
        }
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.deleted")); 
    }
    public function deleteThis(Meal $item){
        foreach($item->images as $image){
            Storage::delete("public/".$image->image) ; 
            $image->delete();
        }
        $item->delete();
        $this->dispatch('alert' , type: 'success', message: __("message.deleted")); 
    }

    public function addLimit(){ 
        if (Meal::all()->count() > $this->limit) {
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
    public function mount(){
        $this->loading = true ;
        $this->dispatch("setTimeout", time:"600");
    }
    public function close() {
        $this->delete = false ; 
    }
    public function render(){
        return view('livewire.admin.articles.index');
    }
}
