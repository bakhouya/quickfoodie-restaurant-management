<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaterialTranslation extends Model
{
    use HasFactory;
    public $timestamps = false ; // No need for timestamps
    protected $fillable = ['name'];
}
