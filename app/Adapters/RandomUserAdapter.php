<?php

namespace App\Adapters;

use Illuminate\Support\Facades\Http;

class RandomUserAdapter
{
    protected $baseUrl = 'https://randomuser.me/api';

    public function fetchUsers($results = 1)
    {
        $response = Http::get("{$this->baseUrl}?results={$results}");

        if ($response->successful()) {
            return $response->json()['results'];
        }

        return [];
    }
}
