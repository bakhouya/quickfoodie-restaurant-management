<?php

namespace App\Livewire\Admin\Settings\Languages;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule ;
use Livewire\WithFileUploads;
use App\Models\language ; 
use Livewire\Component;
class Create extends Component{
    use WithFileUploads ;
    public $data = [] , $image = "";
    public $loading = false ; 
    public  $id ;
    public  $path =  'images/language' ;
    public $model = false , $typeModel = "create";

    protected $listeners = ["edit", "continue"] ;

    public function edit(language $item) {
        $this->data = $item->toArray() ;
        $this->id = $item->id ;
        $this->typeModel = "update" ;
        $this->model = true ;
    }
    public function update(language $item) {
        $validation = $this->validate() ;
        $this->filterData() ;
        if ($this->image != "") { 
            Storage::delete("public/".$this->data["image"]) ; 
            $this->data["image"] = $this->image->store($this->path, "public"); 
        }
        $updated = $item->update($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated"));
    }
    public function getModelcreate(){
        $this->typeModel = "create" ;
        $this->model = true ;
    } 
    // =========================create===========================================
    public function create(){
        $validation = $this->validate() ;
        if ($validation) {
            $this->filterData();
            $this->data["image"] = $this->image->store($this->path, "public"); //store file image in storage
            $creation = language::create($this->data) ; // create now lang in database
            if ($creation) {
                $this->close() ;
                $this->dispatch('alert' , type: 'success', message: __("message.created")); 
            }
        }  
    }
    // =========================create===========================================
    // =========================IMAGES===========================================
    public function removeImage () {
        $this->image  = "" ; 
    }
    // =========================IMAGES===========================================
    // =========================validation===========================================
    public function rules(){
        if ($this->typeModel == "create") {
            return [
                'data.name' => 'required|string|unique:languages,name,'.$this->id,
                'data.locale' => 'required|string|unique:languages,locale,'.$this->id,
                'image' => 'required|image|mimes:jpg,png,jpeg,gif',
            ]; 
        } else{
            return [
                'data.name' => 'required|string|unique:languages,name,'.$this->id,
                'data.locale' => 'required|string|unique:languages,locale,'.$this->id,
            ]; 
        }
        // 'timezone' => 'required|timezone',
        // $rules = [];
        // foreach ($this->languages as $lang) {
        //     $rules["name.$lang"] = [
        //         'required',
        //         'string',
        //         'min:3',
        //         Rule::unique('meals', 'name->' . $lang),
        //     ];
        // }
        // return $rules;
        // $table->string('timezone')->default('UTC'); // الافتراضي UTC
        // جلب المنطقة الزمنية من قاعدة البيانات
        // $timezone = Auth::user()->timezone ?? 'UTC';
        // // تحديث إعدادات Laravel
        // Config::set('app.timezone', $timezone);
        // date_default_timezone_set($timezone);
        
        // // تحديث Carbon ليعرض التوقيت الجديد
        // Carbon::setTestNow(Carbon::now($timezone));
    //     <select name="timezone" id="timezone">
    //     @foreach(timezone_identifiers_list() as $tz)
    //         <option value="{{ $tz }}" {{ auth()->user()->timezone == $tz ? 'selected' : '' }}>
    //             {{ $tz }}
    //         </option>
    //     @endforeach
    // </select>


             
    }
    // =========================validation===========================================
    // =========================filter data===========================================
    public function filterData(){
        // ====== filter field ===============
        $this->data["name"] = filter_var($this->data["name"], FILTER_SANITIZE_STRING);
        $this->data["name"] = strip_tags($this->data["name"]);
        $this->data["name"] = htmlspecialchars($this->data["name"]);

        $this->data["locale"] = filter_var($this->data["locale"], FILTER_SANITIZE_STRING);
        $this->data["locale"] = strip_tags($this->data["locale"]);
        $this->data["locale"] = htmlspecialchars($this->data["locale"]);
    }
    // =========================filter data===========================================
    public function mount() {
        $this->resetField();
    }
    public function resetField() {
        $this->data["name"] = "" ;
        $this->data["locale"] = "" ;
        $this->data['status'] = true ;
        $this->data["image"]  = "" ;
        $this->image  = "" ;
    }
    public function updated() {
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function close(){
        $this->resetField() ;
        $this->updated() ;
        $this->typeModel = "create" ;
        $this->model = false ;
    }
    public function render(){
        return view('livewire.admin.settings.languages.create');
    }
}
