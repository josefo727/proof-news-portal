<?php

namespace App\Adapters;

use Illuminate\Support\Facades\Http;

class NewsApiAdapter
{
    protected $baseUrl;

    protected $apiKey;

    public function __construct()
    {
        $this->baseUrl = config('news_api.url_base');
        $this->apiKey = config('news_api.api_key');
    }

    public function fetchArticles(string $query, int $pageSize = 30)
    {
        if (is_null($this->apiKey)) {
            return [];
        }

        $response = Http::get($this->baseUrl, [
            'language' => 'es',
            'q' => $query,
            'searchIn' => 'title,description',
            'pageSize' => $pageSize,
            'apiKey' => $this->apiKey,
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return [];
    }
}
