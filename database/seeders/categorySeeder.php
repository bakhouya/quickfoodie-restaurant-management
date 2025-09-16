<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class categorySeeder extends Seeder
{
    public function run(): void
    {
        
        $locales = ['en', 'ar', 'fr']; // اللغات المتاحة
        $statuses = [true, false];

        for ($i = 1; $i <= 40; $i++) {
            $translations = [];

            foreach ($locales as $locale) {
                $translations[$locale] = [
                    'name' => $locale === 'ar' ? "الفئة $i"  : "Category $i" ,
                    'description' => $locale === 'ar' ? "وصف للفئة $i" : "Description for Category $i",
                ];
            }

            Category::create(array_merge([
                'image' => "categories/category_$i.jpg",
                'status' => $statuses[array_rand($statuses)],
            ], $translations));
        }
    }
}
