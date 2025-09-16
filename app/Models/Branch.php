<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory ;
use Illuminate\Database\Eloquent\Model ;

class Branch extends Model {

    use HasFactory ;
    protected $fillable = ['city_id','phone','status','name', 'address'];

    public function users() {
        return $this->hasMany(User::class);  
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
    
}
