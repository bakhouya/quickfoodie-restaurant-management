<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB ;
class languageSeederTable extends Seeder{

    public function run(): void
    {
        $languages = [

            [
                "name" => "arabic", 
                "locale" => "ar" , 
                'image' => 'assets/media/lang/ma.png'
            ],
            [
                "name" => "français", 
                "locale" => "fr" , 
                'image' => 'assets/media/lang/mf.png'
            ],
            [
                "name" => "english", 
                "locale" => "en" , 
                'image' => 'assets/media/lang/gb.png'
            ],
            
        ];
        DB::table('languages')->insert($languages);
    }
}
