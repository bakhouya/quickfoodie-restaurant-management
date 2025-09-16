<?php

namespace App\Livewire\Admin\Users;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

use App\Models\User ;
class Index extends Component{
    use WithPagination;
    public $delete = false , $id , $tabs = 1, $loading= false , $loadLimit = false  , $selection = false ;
    public $listSelect = [] ;
    public $search = "" , $limit = 7 , $status ;
    protected $listeners = ["continue"] ; 
    // filter
    public $selectRoleFilter = false , $textButtonGetFilterRole = "touts des Roles";
    public $filterStatus = "" , $orderBy = "DESC", $hasRole = "";
    
    #[Computed]  
    public function users(){
        if (auth()->user()->hasRole('fondateur')) {
            return User::query()->when($this->search, function($query){
                return $query->where('name', 'like', '%'. $this->search .'%')
                               ->orWhere('email', 'like', '%'. $this->search .'%')
                               ->orWhere('phone', 'like', '%'. $this->search .'%') ;
            })->when($this->filterStatus, function($query){
                return $query->where('status', $this->filterStatus);
            })->when($this->hasRole, function($query){
                    return $query->whereHas('roles', function($query){
                        return $query->where('id', $this->hasRole);
                    });
            })->where("id", "!=" , auth()->id())->orderBy('id', $this->orderBy)->paginate(6); 

        } else {
            return User::query()->where("id", "!=" , auth()->id())
                ->where("branch_id", auth()->user()->branch_id)
                ->where('name', 'like', '%'. $this->search .'%')->orderBy('id', 'DESC')
                ->paginate(6);
        }   
    }
    #[Computed]  
    public function roles(){
         return Role::all() ;
    }
    public function getSelectRolesFilter(){
        $this->selectRoleFilter = true ;
    }
    public function updatedSearch(){
        // when i search live i want resetpage component to get now seletion
        $this->resetPage() ;
    }
    public function updateHasRole(){
        if ($this->hasRole != "") {
            $this->textButtonGetFilterRole = Role::where("id", $this->hasRole)->first()->name ;
        }else{
            $this->textButtonGetFilterRole = "touts des Roles" ;
        }
        $this->selectRoleFilter = false ;
        $this->resetPage() ;
    }
    public function edit($item){
        $this->dispatch("edit", item:$item);  
    }
    // ===================================================================
    public function selectThisItem($id) {
        //ADD ID ITEM IF NOT HAVE IN THIS ARRAY SELECTION LIST 
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
    }
    public function handleChangeStatusAll(){
        $users = User::whereIn("id", $this->listSelect)->get() ;
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
    public function confirmDelete($item) {
        $this->delete = true ; 
    }
    public function forceDelete() {
        $users = User::whereIn("id", $this->listSelect)->get() ;
        foreach ($users as $key => $user) {
                $user->delete();     
        }
        if($this->selection) {
            $this->closeSelection();
        }
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.deleted")); 
    }
    public function getModelEdit($i) {
        $this->dispatch('getModelEdit' , item: $i); 
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
        // $this->selectRoleFilter = false ;
    }
    public function render(){
        return view('livewire.admin.users.index');
    }
}
