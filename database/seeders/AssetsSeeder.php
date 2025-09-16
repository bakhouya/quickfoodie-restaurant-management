<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asset ;
use Str ;
class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [true, false];

        for ($i = 1; $i <= 20; $i++) {
            Asset::create([
                'name' => Str::random(10),
                'address' => Str::random(20),
                'phone' => Str::random(10),
                'status' => $statuses[array_rand($statuses)],
            ]);
        }
    }
}
