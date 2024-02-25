<?php

namespace App\Services;

use App\Adapters\NewsApiAdapter;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class NewsApiService
{
    protected $newsApiAdapter;

    protected int $pageSize = 15;

    public function __construct(NewsApiAdapter $newsApiAdapter)
    {
        $this->newsApiAdapter = $newsApiAdapter;
    }

    public function fetchAndStoreArticles()
    {
        $categories = Category::all();

        foreach ($categories as $category) {
            $articles = $this->newsApiAdapter->fetchArticles($category->slug, $this->pageSize)['articles'] ?? [];

            foreach ($articles as $article) {
                Post::firstOrCreate(
                    ['slug' => Str::slug($article['title'])],
                    [
                        'title' => $article['title'],
                        'excerpt' => Str::limit(strip_tags($article['description']), 250),
                        'body' => $article['content'] ?? 'No content available',
                        'published_at' => $article['publishedAt'],
                        'image' => $article['urlToImage'],
                        'category_id' => $category->id,
                    ]
                );
            }
        }
    }
}
