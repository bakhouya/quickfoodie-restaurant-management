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
class Create extends Component
{

    public $data = [] , $permissionsData = [];
    public $step = 1 , $loading = false ; 
    public $activeSubmit = false ;
    public $etaps , $id ;
    public $model = false , $typeModel = "create" , $search = "";
    protected $listeners = ["getModelEdit", "continue", "edit"] ;

    public function edit(Role $item) {
        $this->data = $item->toArray();
        $this->permissionsData = $item->permissions->pluck('name')->all();
        $this->id = $item->id ;
        $this->typeModel = "edit" ;
        $this->model = true ;
    }
    public function update(Role $item) {
        $this->filterData();
        $updated = $item->update($this->data) ;
        $item->syncPermissions($this->permissionsData);
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    public function getModelCreate(){
        $this->typeModel = "create" ;
        $this->model = true ;
    }   
    public function create(){
        $this->validate() ;
        $this->filterData();
        $creation = Role::create($this->data) ;
        $creation->givePermissionTo($this->permissionsData);
        $this->close() ;
        $this->dispatch('alert' , type: 'create successfully', message: __("app.success"));      
    }
    public function filterData(){
        // ====== filter field ===============
        $this->data["name"] = filter_var($this->data["name"], FILTER_SANITIZE_STRING);
        $this->data["name"] = strip_tags($this->data["name"]);
        $this->data["name"] = htmlspecialchars($this->data["name"]);

        $this->data["description"] = filter_var($this->data["description"], FILTER_SANITIZE_STRING);
        $this->data["description"] = strip_tags($this->data["description"]);
        $this->data["description"] = htmlspecialchars($this->data["description"]);
  
    }
    public function selectAll(){
        if (count($this->permissionsData) <= 0) {
            $this->permissionsData = $this->permissions()->pluck('name');
        } else {
            $this->permissionsData = [];
        }   
    }
    #[Computed]  
    public function permissions(){
        return Permission::query()->where('name', 'like', '%'. $this->search .'%')->orderBy('id', 'ASC')->get() ;
    }

    // =================================VALIDATION=================
    public function rules(){

        if ($this->step == 1) {
            return [
                'data.name' => 'string',
                // 'data.name' => 'required|string|max:100|min:5',
                // 'data.email' => 'required|string|max:100|unique:users,email,'.$this->id,
                // 'data.phone' => 'required|string|max:100|unique:users,phone,'.$this->id,
            ]; 
        }elseif($this->step == 2) {
            return [
                'permissionsData' => 'required|array',
            ]; 
        }
    }
    // =================================VALIDATION=================
    // =========================TABS===========================================
    public function next() {
        $validate = $this->validate() ;
        if($validate) {
            $this->loading = true ;
            $this->dispatch("setTimeout", time:"100");
            if($this->step <= count($this->etaps)) {
                $this->step = $this->step + 1 ;
            }  
        }
         
    }
    public function continue(){
        $this->loading = false ;            
    }
    public function prev() {
        if($this->step >= count($this->etaps)) {
            $this->step = $this->step - 1 ;
        }
    }
    // =========================TABS===========================================
    public function mount() {
        $this->data["name"] = "" ;
        $this->data["description"] = "" ;
        $this->data["status"] = true ;
        $this->etaps = [
            0 => "1" ,
            1 => "2" ,
        ];
    }
    public function updated() {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function close(){
        $this->mount();
        $this->typeModel = "create" ;
        $this->activeSubmit = false ;
        $this->model = false ;
        $this->step = 1 ;
        $this->permissionsData = [];
    }
    public function render(){
        if ($this->step >= 2) {
            $this->activeSubmit = true ;
        }else {
            $this->activeSubmit = false ;
        }
        return view('livewire.admin.settings.roles.create');
    }
}
