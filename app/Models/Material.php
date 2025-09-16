<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
class Material extends Model  implements TranslatableContract
{
    use HasFactory;
    use Translatable;   
    protected $fillable = ['status', 'image'];
    public $translatedAttributes = ['name'];

    public function supplier(){
        return $this->belongsToMany(Asset::class, 'asset_has_materials', 'material_id', 'asset_id') ;
    }
}
