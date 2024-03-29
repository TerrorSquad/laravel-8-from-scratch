<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    // protected $fillable = ['title', 'excerpt', 'body', 'published_at', 'slug', 'category_id'];

    protected $with = ['category', 'author'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }

    public function scopeFilter(Builder $query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            fn (Builder $query, $search) => $query->where(
                fn (Builder $query) => $query
                    ->where('title', 'like', '%'.$search.'%')
                    ->orWhere('body', 'like', '%'.$search.'%')
            )
        );
        $query->when(
            $filters['category'] ?? false,
            fn (Builder $query, $category) => $query->whereHas(
                'category',
                fn (Builder $query) => $query->where('slug', $category)
            )
        );
        $query->when(
            $filters['author'] ?? false,
            fn (Builder $query, $author) => $query->whereHas(
                'author',
                fn (Builder $query) => $query->where('username', $author)
            )
        );
    }
}
