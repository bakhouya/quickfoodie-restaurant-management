<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Meal extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;   
    protected $fillable = [
        'status', 
        "price" , 
        "price_achat",
        "tags",
        "category_id"
    ];
    public $translatedAttributes = ['name', 'description'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function images() {
        return $this->hasMany(MealImages::class);  
    }
    public function lastMessage() {
        return $this->images()->first()->image ;  
    }
}
