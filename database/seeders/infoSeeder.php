<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Information ;
class infoSeeder extends Seeder
{

    public function run(): void
    {
        Information::create([
            'name' => 'la pizz harhoura',
            'description' => 'harhoura avant bhar',
            'seoName' => 'la pizz harhoura',
            'seoDescription' => 'harhoura avant bhar',
            'icon' => '',
            'image' => '',
            'email' => 'domain@gmail.com',
            'phone' => '0772013984',
        ]);
    }
}
