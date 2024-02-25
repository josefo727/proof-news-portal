<?php

namespace Database\Seeders;

use App\Services\NewsApiService;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(NewsApiService::class)->fetchAndStoreArticles();
    }
}
