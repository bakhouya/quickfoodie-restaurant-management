<?php

namespace App\Livewire\Admin\Users;
use Illuminate\Support\Facades\Crypt;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User ; 
use App\Models\Branch ;
use Illuminate\Support\Facades\Hash ;
use Spatie\Permission\Models\Role;
class Create extends Component{
    public $role = [] ;
    public $data = [] , $images = [] , $tag = "" , $tags = [];
    public $tabs , $step = 1 , $loading = false ; 
    public $activeSubmit = false ;
    public $etaps , $id , $search = "";

    public $model = false , $typeModel = "create" ;
    protected $listeners = ["continue", "edit"] ;

    public function edit(User $item) {
        // GET ITEM DATA TO ARRAY TO ARRAY DATA 
        $this->data = $item->toArray();
        // GET ROLES THIS ITEM USER
        $this->role = $item->roles->pluck('name')->all();
        // GET ID USER TO CONTROLLER
        $this->id = $item->id ; 
        // CHANGE TYPE MODEL TO EDIT
        $this->typeModel = "edit" ;
        // SHOW MODEL FORM
        $this->model = true ;
    }
    public function update(User $item) {
        // SURE IF VALIDATION SUCCESSFULY
        $this->validate();
        // GET SCAN FILTRT VALUE DATA
        $this->handleKeyFilter();
        // AUPDATE DATA IN DATABASE
        $updated = $item->update($this->data) ;
        // AUPDATE ROLES THIS USER ITEM
        $item->syncRoles($this->role);
        //COLSE THE MODEL FORM AND RESSET ERRORE AND FIELD 
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    public function getModelCreate(){
        $this->typeModel = "create" ;
        $this->model = true ;
    }   
    public function create(){
        // SURE IF VALIDATION SUCCESSFULY
        $this->validate() ; 
        // GET SCAN FILTRT VALUE DATA
        $this->handleKeyFilter() ; 
        // HASH PASSWORD VALUE  
        $this->data["password"] = Hash::make($this->data["password"]); 
        // ADD DATA TO DATABASE
        $creation = User::create($this->data) ;
        // GET ROLES TO THIS USER 
        $creation->assignRole($this->role) ;
         //COLSE THE MODEL FORM AND RESSET ERRORE AND FIELD   
        $this->close() ;
        // SHOW MSG TO CREATED SUCCESSFULY 
        $this->dispatch('alert' , type: 'success', message: __("app.success"));      
    }
    // GET VALUE DATA TO SCAN FILTER
    public function handleKeyFilter(){
        $this->filterData("name");
        $this->filterData("phone");
        $this->filterData("email");
        if ($this->typeModel == "create") {
            $this->filterData("password");
        } 
    }
    // FILTER DATA BROPS IF HAVE SOME DANGER VALUE BEFORE TO SEND DATABESE 
    public function filterData($key){
        $this->data[$key] = filter_var($this->data[$key], FILTER_SANITIZE_STRING) ;
        $this->data[$key] = strip_tags($this->data[$key]) ;
        return $this->data[$key] ;
    }

    #[Computed]  
    public function roles(){
        return Role::where('name', 'like', '%'. $this->search .'%')->get();
    }
    #[Computed]  
    public function branches(){
        return Branch::where('name', 'like', '%'. $this->search .'%')->get();
    }
    // =========================IMAGES===========================================
    public function removeImageInArray ($key) {
        unset($this->images[$key]) ;
        $this->images = array_values($this->images) ;   
    }
    // =========================IMAGES===========================================
    // =================================VALIDATION=================
    public function rules(){

        if ($this->step == 1) {
            return [
                'data.name' => 'required|string|max:100|min:5',
                'data.email' => 'required|email|unique:users,email,'.$this->id,
                'data.phone' => 'required|max:10|unique:users,phone,'.$this->id,
                // 'data.password' => 'required|max:8|min:8',
            ]; 
        }elseif($this->step == 2) {
            return [
                'data.branch_id' => 'required',
            ]; 
        }elseif($this->step == 3) {
            return [
                'role' => 'required',
            ]; 
        }
    }
    // =================================VALIDATION=================
    // =========================TABS===========================================
    public function next() {
        // get validate step 1 before move to step 2
        $validate = $this->validate() ; 
        // if validate successfuly
        if($validate) { 
            // get loading and send event to js || waint 100s before hide loading
            $this->loading = true ;
            $this->dispatch("setTimeout", time:"100");
            // if have more step get him 
            if($this->step <= count($this->etaps)) {
                $this->step = $this->step + 1 ;
            }  
        }
         
    }
    public function continue(){
        $this->loading = false ;            
    }
    public function prev() {
        // return to past step if have 
        if($this->step > 1) {
            $this->step = $this->step - 1 ;
        }
    }
    // =========================TABS===========================================
    public function mount() {
        $this->data["name"] = "" ;
        $this->data["phone"] = "" ;
        $this->data["email"] = "" ;
        $this->data["password"] = "" ;
        $this->data["branch_id"] = null ;
        $this->data["status"] = true ;
        $this->etaps = [
            0 => "1" ,
            1 => "2" ,
            3 => "3" ,
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
        $this->updated();
    }
    public function render(){
        if ($this->step >= count($this->etaps)) {
            $this->activeSubmit = true ;
        }else {
            $this->activeSubmit = false ;
        }
        return view('livewire.admin.users.create');
    }
}
