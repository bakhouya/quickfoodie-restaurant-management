<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            languageSeederTable::class,
            CitiesSeeder::class,
            branchSeeder::class,
            roleSeederTable::class,
            permissionSeederTable::class,
            userSeederTable::class,
            infoSeeder::class,

            categorySeeder::class,
            mealSeeder::class,
            AssetsSeeder::class,
            materialSeeder::class,
            HasMaterialSeeder::class,
        ]);
    }
}
