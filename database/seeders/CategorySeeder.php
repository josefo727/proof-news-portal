<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Business'],
            ['name' => 'Entertainment'],
            ['name' => 'General'],
            ['name' => 'Health'],
            ['name' => 'Science'],
            ['name' => 'Sports'],
            ['name' => 'Technology'],
        ];

        Category::factory()
            ->count(count($categories))
            ->sequence(...$categories)
            ->create();
    }
}
