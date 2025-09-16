<?php

namespace App\Livewire\Admin\Settings\Roles;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class Index extends Component{

    public $delete = false , $id , $tabs = 1, $loading= false , $loadLimit = false  , $selection = false ;
    public $listSelect = [] ;
    public $search = "" , $limit = 7 , $status ;
    protected $listeners = ["continue", "addLimit"] ; 

    #[Computed]  
    public function roles(){
        return Role::query()->where('name', 'like', '%'. $this->search .'%')->orderBy('id', 'DESC')
                ->limit($this->limit)->get();
    }



    public function edit($item){
        $this->dispatch("edit", item:$item); 
    }
    // ===================================================================
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
    public function hasPermissions($item) {
        $this->dispatch("hasPermissions", item:$item); 
    }
    // ==================================action selection==============================
    public function handleConfirmDeleteAll(){
        $this->delete = true ;
    }
    public function handleChangeStatusAll(){
        $users = Role::whereIn("id", $this->listSelect)->get() ;
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
        $users = Role::whereIn("id", $this->listSelect)->get() ;
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



    public function addLimit(){ 
        if (Role::all()->count() > $this->limit) {
            $this->loadLimit = true ;
            $this->dispatch("setTimeout", time:"600") ;
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
        $this->dispatch("setTimeout", time:"600");
    }
    public function close() {
        $this->delete = false ; 
    }
    public function render(){
        return view('livewire.admin.settings.roles.index');
    }
}
