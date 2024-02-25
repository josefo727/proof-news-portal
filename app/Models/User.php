<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use Notifiable;
    use Searchable;

    protected $fillable = ['name', 'email', 'password', 'image'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super-admin');
    }

    public function getImageAttribute($value)
    {
        return is_null($value)
            ? 'https://ui-avatars.com/api/?name='.$this->getInitials().'&color=7F9CF5&background=EBF4FF'
            : (
                Str::startsWith($value, ['http://', 'https://'])
                    ? $value
                    : Storage::url($value)
            );
    }

    public function getInitials()
    {
        $words = explode(' ', $this->name);

        $words = array_filter($words);

        $initials = array_map(function ($word) {
            return strtoupper($word[0]);
        }, $words);

        $initials = array_slice($initials, 0, 2);

        return implode('', $initials);
    }
}
