<?php

namespace App\Livewire\Admin\Settings\Media;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use App\Models\Media ;
use Livewire\Component;

class Index extends Component{
    public $delete = false , $id , $loading= false ;
    public $search , $limit = 7 , $status ;

    // listeners
    protected $listeners = ["continue"] ;

    #[Computed]  
    public function materials(){
        return Media::where('name', 'like', '%'. $this->search .'%')
                    ->orderBy('id', "DESC")->limit($this->limit)->get();
           
    }
    public function addLimit(){ 
        if (Media::all()->count() > $this->limit) {
            $this->loadLimit = true ;
            $this->dispatch("setTimeout", time:"200") ;
            $this->limit = $this->limit+7 ;
        } 
    }
    public function edit($item){
        $this->dispatch("edit", item:$item); 
    }
    public function handleChangeStatus(Media $item){
        if ($item->status == false) {
            $item->update(["status" => true]) ; 
        } else {
            $item->update(["status" => false]) ; 
        } 
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    public function handleConfirmDelete(Media $item){
        $this->delete = true ;
        $this->id = $item->id ;
    }
    public function forceDelete(){
        $item = Media::where('id', $this->id)->first() ;
        if($item){
            $item->delete();
            $this->close() ;
            $this->dispatch('alert' , type: 'success', message: __("message.deleted"));
        }  
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
    public function render()
    {
        return view('livewire.admin.settings.media.index');
    }
}
