<?php

namespace App\Livewire\Admin\Meals;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed ;
use Livewire\WithPagination;
use App\Models\Meal  ;
use Livewire\Component ;
use App\Models\Category ;
class Index extends Component{
    use WithPagination;

    public $delete = false , $id , $tabs = 1, $loading= false , $selection = false ;
    public $listSelect = [] ;
    public $search , $limit = 8 , $status ;
    public $boxfilter = false ;
    // filter
    public $filterStatus = "" , $orderBy = "DESC";
    public $data = ['category_id' => ""] ;
    // listeners
    protected $listeners = ["continue","addLimit"] ;

    public function getfilterUseCategory(){
        $this->boxfilter =true ;
    }
    #[Computed]  
    public function meals(){
        return Meal::whereHas("translations", function($query){
            $query->where('name', 'like', '%'. $this->search .'%');
            $query->orWhere('description', 'like', '%'. $this->search .'%') ;
        })->when($this->filterStatus, function($query){
            return $query->where('status', $this->filterStatus);
        })->when($this->data["category_id"], function($query){
            return $query->where('category_id', $this->data["category_id"]);
        })->orderBy('id', $this->orderBy)->paginate(6);   
    }
    #[Computed] 
    public function categories(){
        return Category::whereHas("translations", function($query){
            // $query->where('name', 'like', '%'. $this->search .'%');
            // $query->orWhere('description', 'like', '%'. $this->search .'%');
        })->where("status", true)->get();
    }
    public function updatedSearch(){
        $this->resetPage() ;
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
            $this->dispatch("setTimeout", time:"100") ;
            $this->limit = $this->limit+8 ;
        } 
    }
    public function changeTabs($tabs){
        $this->loading = true ;
        $this->tabs = $tabs ;
        $this->dispatch("setTimeout", time:"600");           
    }
    public function continue(){
        $this->loading = false ;
        $this->loadLimit = false ;                  
    }
    public function updated (){
        $this->loading = true ;
        $this->dispatch("setTimeout", time:"100");
    }
    public function close() {
        $this->delete = false ; 
        $this->boxfilter = false ;
    }
    public function render(){
        return view('livewire.admin.meals.index');
    }
}
