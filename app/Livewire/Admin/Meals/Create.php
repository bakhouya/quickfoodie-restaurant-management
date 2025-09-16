<?php

namespace App\Livewire\Admin\Meals;
use Illuminate\Support\Facades\Storage;
use Str;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rule as ValidationRule;
use Livewire\WithFileUploads;
use App\Helpers\langHelper ;
use Livewire\Component;
use App\Models\Meal ;
use App\Models\Category ;
use App\Models\MealImages ;

class Create extends Component{
    use WithFileUploads ;
    public $data = [] , $images = [], $isImages = [] , $tag = "" , $tags = [] ;
    public $tabs , $step = 1 , $loading = false ; 
    public $activeSubmit = false ;
    public $etaps , $id , $search = "" ;
    public $model = false , $typeModel = "create" ;
    // =======================listeners=======================================
    protected $listeners = ["continue", "edit"] ;
    // =======================listeners=======================================
    // =======================show model create now item======================
    public function getModelCreate(){
        $this->typeModel = "create" ;
        $this->model = true ;
    } 
    // =======================show model create now item======================
    public function edit(Meal $item) {
        $this->data['price'] = $item->price ;
        $this->data['price_achat'] = $item->price_achat ;
        $this->data['status'] = $item->status ;

        $this->isImages = $item->images ;
        $this->tags = explode('|', $item->tags);
        $this->tags = array_map('trim', $this->tags) ;

        foreach($item->translations as $translation){
            $this->data[$translation->locale] = $translation->toArray();
        }
        $this->id = $item->id ;
        $this->typeModel = "update" ;
        $this->model = true ;
    }
    public function update(Meal $item) {
        $this->handleKeyFilter();
        // if ubloading now images 
        if ($this->images != []) {
            // delete imgaes in file storage and data
            foreach($this->isImages as $image){
                Storage::delete("public/".$image->image) ; 
                $image->delete();
            }
            // save now images in storage and database
            foreach ($this->images as $image) {
                MealImages::create([
                    "image" => $image->store('images/meals', "public"),
                    "meal_id" => $item->id ,
                ]);
            }
        }
        // implode tags array to normal text 
        $this->data['tags'] = implode("|", $this->tags) ;
        // update data in database
        $updated = $item->update($this->data) ;
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("message.updated")); 
    }
    public function removeImageInData(MealImages $item){
        Storage::delete("public/".$item->image) ; 
        $item->delete();
        $this->dispatch('alert' , type: 'created successfully', message: __("message.deleted")); 
    }
    public function create(){
        $this->validate() ;
        $this->handleKeyFilter();
        // dd($this->data);
        $this->data['tags'] = implode("|", $this->tags) ;  
        $created = Meal::create($this->data) ;
        if($created){
            foreach ($this->images as $image) {
                MealImages::create([
                    "image" => $image->store('images/meals/', "public"),
                    "meal_id" => $created->id ,
                ]);
            }
        }
        $this->close() ;
        $this->dispatch('alert' , type: 'success', message: __("app.success"));    
    }
    #[Computed] 
    public function categories(){
        return Category::whereHas("translations", function($query){
            $query->where('name', 'like', '%'. $this->search .'%');
            $query->orWhere('description', 'like', '%'. $this->search .'%');
        })->where("status", true)->get();
    }
    // =========================TAGS===========================================
    public function addTags() {
        if ($this->tag != "" && $this->tag != null) {
            if(!in_array($this->tag, $this->tags)){
                array_push($this->tags, $this->tag);
            }
            $this->tag = "" ;
        }else {

        }    
    }
    public function removeTagInArray ($key) {
        unset($this->tags[$key]) ;
        $this->tags = array_values($this->tags) ;   
    }
    // =========================TAGS===========================================
    // =========================IMAGES===========================================
    public function removeImageInArray ($key) {
        unset($this->images[$key]) ;
        $this->images = array_values($this->images) ;   
    }
    public function saveImages(){
        foreach ($this->images as $image) {
            MealImages::create([
                "image" => $image->store('images/meals', "public"),
                "meal_id" => $item->id ,
            ]);
        }
    }
    // =========================IMAGES===========================================
    // =================================VALIDATION=================
    public function rules(){
        if ($this->step == 1) {
            return [
                'data.fr.name' => 'required|min:5',
                // 'data.fr.name' => 'required|string|max:100|min:5',
                'data.fr.description' => 'required|string',
                // 'data.ar.name' => 'required|string|max:100|min:5',
                // 'data.ar.description' => 'required|string',
                // 'data.en.name' => 'required|string|max:100|min:5',
                // 'data.en.description' => 'required|string',
                // 'data.prix' => 'required|integer',
            ]; 
        }elseif($this->step == 2){
            return [
                'images' => 'array',
            ];
        }elseif($this->step == 3){
            return [
                'images' => '',
            ];
        }elseif($this->step == 3){
            return [
                'data.category_id' => 'required',
            ];
        }      
    }
    public function handleKeyFilter(){
        foreach (langHelper::getLanguages() as $key => $lang) {
            $this->data[$lang->locale]["name"] = filter_var($this->data[$lang->locale]["name"], FILTER_SANITIZE_STRING);
            $this->data[$lang->locale]["name"] = strip_tags($this->data[$lang->locale]["name"]);
            $this->data[$lang->locale]["name"] = htmlspecialchars($this->data[$lang->locale]["name"]);

            $this->data[$lang->locale]["description"] = filter_var($this->data[$lang->locale]["description"], FILTER_SANITIZE_STRING);
            $this->data[$lang->locale]["description"] = strip_tags($this->data[$lang->locale]["description"]);
            $this->data[$lang->locale]["description"] = htmlspecialchars($this->data[$lang->locale]["description"]);
        }
        $this->filterData("price");
        $this->filterData("price_achat");
        $this->filterData("tags");
    }
    public function filterData($key){
        $this->data[$key] = filter_var($this->data[$key], FILTER_SANITIZE_STRING) ;
        $this->data[$key] = strip_tags($this->data[$key]) ;
        return $this->data[$key] ;
    }
    public function handlFieldData(){
        $this->data["ar"]["name"] = Str::random(20);
        $this->data["ar"]["description"] = Str::random(20);
        $this->data["en"]["name"] = Str::random(20);
        $this->data["en"]["description"] = Str::random(20);
        // $this->data["ar"]["name"] = langHelper::translate($this->data["fr"]["name"], 'ar') ;
        // $this->data["ar"]["description"] = langHelper::translate($this->data["fr"]["description"], 'ar') ;
        // $this->data["en"]["name"] = langHelper::translate($this->data["fr"]["name"], 'en') ;
        // $this->data["en"]["description"] = langHelper::translate($this->data["fr"]["description"], 'en') ;
    }
    // =================================VALIDATION=================
    // =========================TABS===========================================
    public function changeTabs($local) {
        $this->tabs = $local ;
    } 
    public function next() {
        $validate = $this->validate() ;
        if($validate) {
            if($this->step <= count($this->etaps)) {
                $this->loading = true ;
                $this->dispatch("setTimeout", time:"100");
                $this->step = $this->step + 1 ;
            }  
        }   
    }
    public function continue(){
        $this->loading = false ;            
    }
    public function prev() {
        if($this->step > 1) {
            $this->loading = true ;
            $this->dispatch("setTimeout", time:"100");
            $this->step = $this->step - 1 ;
        }
    }
    // =========================TABS===========================================
    public function mount() {
        $this->tabs = app()->getLocale() ;
        $this->etaps = [
            0 => "1" ,
            1 => "2" ,
            3 => "3" ,
            // 4 => "4" ,
        ];
        $this->resetField();
    }
    public function resetField() {
        foreach (langHelper::getLanguages() as $key => $lang) {
            $this->data[$lang->locale]["name"] = "" ; 
            $this->data[$lang->locale]["description"] = "" ;
        }
        $this->data['price'] = "";
        $this->data['price_achat'] = "" ;
        $this->data['status'] = true ;
        $this->data['tags'] = "";
        $this->tags = [] ; //tags array before get data to $data['tags']
        $this->images = [] ; // images saved in database to this item 
        $this->isImages = [] ; // when i get data to edit item and images
    }
    public function updated() {
        if($this->typeModel == "create"){
            $this->handlFieldData() ;           
        }
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function close(){
        $this->resetField() ;
        $this->typeModel = "create" ;
        $this->activeSubmit = false ;
        $this->model = false ;
        $this->step = 1 ;
    }
    public function render(){
        if ($this->step >= count($this->etaps)) {
            $this->activeSubmit = true ;
        }else {
            $this->activeSubmit = false ;
        }
        return view('livewire.admin.meals.create');
    }
}
