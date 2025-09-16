<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash ;
use App\Models\User ;
use DB ;
class userSeederTable extends Seeder{

    public function run(): void{
        DB::table('users')->delete();
        User::factory(23)->create() ;
        $fondateur = User::create([
            'name' => 'Mostafa Ell',
            'email' => 'kamfour1997@gmail.com',
            'phone' => '0772013984',
            'branch_id' => 1,
            'password' => Hash::make('12345') ,
        ]);
        $directeur = User::create([
            'name' => 'ikram kholfi',
            'email' => 'hamid11@gmail.com',
            'phone' => '0772013985',
            'branch_id' => 2,
            'password' => Hash::make('12345') ,
        ]);

        $fondateur->assignRole("fondateur");
        $directeur->assignRole("directeur de restaurant");
    }
}
