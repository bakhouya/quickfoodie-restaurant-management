<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Branch ;
class branchSeeder extends Seeder
{
    public function run(): void{
        Branch::create([
            'name' => 'la pizz harhoura',
            'address' => 'harhoura avant bhar',
            'city_id' => '1',
            'phone' => '0772013984',
            'status' => true ,
        ]);
        Branch::create([
            'name' => 'la pizz margin agdal',
            'address' => 'agdal city rabat margin',
            'city_id' => '3' ,
            'phone' => '0772013985',
            'status' => true ,
        ]);
    }
}
