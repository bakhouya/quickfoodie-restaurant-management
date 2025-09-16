<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealImages extends Model{
    
    use HasFactory;
    public $timestamps = false ; 
    protected $fillable = ['image', 'meal_id'] ;

    public function category(){
        return $this->belongsTo(Meal::class) ;
    }
}
