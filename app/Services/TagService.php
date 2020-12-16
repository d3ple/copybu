<?php

namespace App\Services;

use App\Models\Tag;


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
}