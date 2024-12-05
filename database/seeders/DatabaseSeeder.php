<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Category;
use \App\Models\Strategy;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'ACCESSIBILITY', 'status' => false],
            ['name' => 'BEST_PRACTICES', 'status' => false],
            ['name' => 'PERFORMANCE', 'status' => false],
            ['name' => 'PWA', 'status' => false],
            ['name' => 'SEO', 'status' => false],
        ];
    
        foreach ($categories as $category) {
            Category::create($category);
        }
    
        $strategies = [
            ['name' => 'DESKTOP'],
            ['name' => 'MOBILE'],
        ];
    
        foreach ($strategies as $strategy) {
            Strategy::create($strategy);
        }
    }
}
