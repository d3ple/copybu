<?php

namespace App\Services;

use Illuminate\Support\Facades\Cookie;

use App\Helpers\SortHelper;

use App\Models\Post;

class PostService
{
    private $post;

    public function __construct(Post $post) 
    {
        $this->post = $post;
    }

    public function index($sort_type)
    {
        $sort = SortHelper::defineSortType($sort_type);
        $viewed_posts = auth()->user() && auth()->user()->hide_viewed_posts ? explode(",", Cookie::get('viewed_posts')) : [];
        return $this->post->where('is_published', '1')->whereNotIn('id', $viewed_posts)->orderBy($sort[0], $sort[1])->simplePaginate(5)->withQueryString();
    }

    public function showOwnPosts($sort_type)
    {
        $sort = SortHelper::defineSortType($sort_type);
        return $this->post->where('user_id', auth()->user()->id)->orderBy($sort[0], $sort[1])->simplePaginate(5)->withQueryString();
    }

    public function store(object $data)
    {
        $post = $this->post->create([
            'title' => $data->title,
            'text' => $data->text,
            'image_url' => $data->image_url,
            'is_published' => $data->is_published,
            'user_id' => auth()->user()->id,
            'community_id' => $data->community_id,
        ]);

        $post->tags()->attach($data->tags);
        $post->save();

        return $post;
    }
}