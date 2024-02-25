<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use App\Traits\HasAuthor;
use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasAuthor;
    use HasFactory;
    use HasUniqueSlug;
    use Searchable;

    protected $slugSource = 'title';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'published_at',
        'author_id',
        'category_id',
        'image',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getImageAttribute($value)
    {
        return Str::startsWith($value, ['http://', 'https://'])
            ? $value
            : Storage::url($value);
    }
}
