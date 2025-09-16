<?php

namespace App\Livewire\Admin\Settings\Roles;

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HasPermission extends Component{
    public  $role , $search = "" , $hasPermission = false ;
    public $permissionData = [] ;

    protected $listeners = ["hasPermissions"] ; 
    public function hasPermissions(Role $item){
        $this->role = $item ;
        $this->hasPermission = true ;
        $this->permissionData = $item->permissions->pluck('name')->all() ;
    }
    public function handlePermision(){
        $this->role->syncPermissions($this->permissionData) ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    #[Computed]  
    public function permissions(){
        return Permission::query()->where('name', 'like', '%'. $this->search .'%')->orderBy('id', 'ASC')->get() ;
    }
    // if (auth()->user()->hasRole('admin')) {
    //     echo "لديك صلاحيات الأدمن";
    // }
    
    // if (auth()->user()->can('manage orders')) {
    //     echo "يمكنك إدارة الطلبات";
    // }
    // Route::get('/dashboard', function () {
    //     return "لوحة التحكم";
    // })->middleware('role:admin');
    
    // Route::get('/orders', function () {
    //     return "صفحة الطلبات";
    // })->middleware('permission:manage orders');

    public function render(){
        return view('livewire.admin.settings.roles.has-permission');
    }
}
