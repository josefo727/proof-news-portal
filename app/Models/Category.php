<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use App\Traits\HasUniqueSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use HasUniqueSlug;
    use Searchable;

    protected $slugSource = 'name';

    protected $fillable = ['name', 'slug'];

    protected $searchableFields = ['*'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
