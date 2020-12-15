<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'text', 'image_url', 'is_published', 'user_id', 'community_id'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function community()
    {
        return $this->belongsTo(Community::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest',
        ]);
    }

    public static function getPublishedAndSortedPosts($sort_type)
    {
        switch ($sort_type) {
            case 'date':
                $sortBy = 'updated_at';
                $sortType = 'desc';
                break;
            case 'max-rating':
                $sortBy = 'rating';
                $sortType = 'desc';
                break;
            case 'min-rating':
                $sortBy = 'rating';
                $sortType = 'asc';
                break;
            default:
                $sortBy = 'updated_at';
                $sortType = 'desc';
        }

        return self::where('is_published', '1')->orderBy($sortBy, $sortType)->get();
    }
}
