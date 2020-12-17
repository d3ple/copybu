<?php

namespace App\Services;

use App\Models\Tag;

use App\Helpers\SortHelper;

class TagService
{
    private $tag;

    public function __construct(Tag $tag) 
    {
        $this->tag = $tag;
    }

    public function index()
    {
        return $this->tag->all();
    }

    public function showPosts($tags, $sort_type)
    {
        $sort = SortHelper::defineSortType($sort_type);
        $query = $this->tag->with('posts')->findMany($tags)->flatMap->posts->where('is_published', '1');
        $query = $sort[1] === 'asc' ? $query->sortBy($sort[0]) : $query->sortByDesc($sort[0]);
        return $query;
    }
}