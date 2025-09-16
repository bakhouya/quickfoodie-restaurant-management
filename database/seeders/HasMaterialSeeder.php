<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AssetHasMaterial;
class HasMaterialSeeder extends Seeder{
    public function run(): void{
        for ($i= 0 ; $i < 200 ; $i++) { 
            $meal = AssetMaterial::create([
                'asset_id' => rand(1, 20),
                'material_id' => rand(1, 80),
            ]);
        }
    }
}
