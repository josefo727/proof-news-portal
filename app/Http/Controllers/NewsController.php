<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        $posts = Post::query()
            ->with(['author:id,name', 'category:id,name'])
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->paginate(10);

        return view('news.index', compact('posts'));
    }

    public function newsArticle(string $slug)
    {
        $post = Post::query()
            ->with(['author:id,name', 'category:id,name'])
            ->where('slug', $slug)
            ->firstOrFail();

        $posts = Post::query()
            ->with(['author:id,name', 'category:id,name'])
            ->where('category_id', $post->category_id)
            ->whereNot('id', $post->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('news.show', compact('post', 'posts'));
    }

    public function newsByCategory($slug)
    {
        $posts = Category::query()
            ->where('slug', $slug)
            ->firstOrFail()
            ->posts()
            ->paginate(10);

        return view('news.index', compact('posts'));
    }
}
