<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meal;
use App\Models\MealImages;
class mealSeeder extends Seeder
{
    public function run(): void
    {
        $locales = ['en', 'ar', 'fr'];
        $statuses = [true, false];

        for ($i = 1; $i <= 200; $i++) {
            $translations = [];

            foreach ($locales as $locale) {
                $translations[$locale] = [
                    'name' => match ($locale) {
                        'en' => "Meal $i",
                        'ar' => "وجبة $i",
                        'fr' => "Repas $i",
                    },
                    'description' => match ($locale) {
                        'en' => "Description for Meal $i",
                        'ar' => "وصف للوجبة $i",
                        'fr' => "Description du repas $i",
                    },
                ];
            }

            $meal = Meal::create(array_merge([
                'category_id' => rand(1, 40),
                'price' => rand(15, 100),
                'price_achat' => rand(15, 100),
                'tags' => 'tag' . rand(1, 10) . '|tag' . rand(11, 20),
                'status' => $statuses[array_rand($statuses)],
            ], $translations));

            // إضافة صور متعددة (بين 2 إلى 5 صور)
            for ($j = 1; $j <= rand(2, 5); $j++) {
                MealImages::create([
                    'meal_id' => $meal->id,
                    'image' => "meals/meal_{$i}_{$j}.jpg",
                ]);
            }
        }
    }
}
