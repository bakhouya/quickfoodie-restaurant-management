<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Material ;
class materialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locales = ['en', 'ar', 'fr'];
        $statuses = [true, false];

        for ($i = 1; $i <= 80; $i++) {
            $translations = [];
            foreach ($locales as $locale) {
                $translations[$locale] = [
                    'name' => match ($locale) {
                        'en' => "Meal $i",
                        'ar' => "وجبة $i",
                        'fr' => "Material name $i",
                    },
                ];
            }
            $meal = Material::create(array_merge([
                'image' => '',
                'status' => $statuses[array_rand($statuses)],
            ], $translations));
        }
    }
}
