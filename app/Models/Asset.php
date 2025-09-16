<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model{
    use HasFactory;
    protected $fillable = ['phone','status','name', 'address'];


    public function materials(){
        return $this->belongsToMany(Material::class, 'asset_has_materials', 'asset_id', 'material_id') ;
    }

}
