<?php

namespace App\Services;

use App\Models\Like;

class LikeService
{
    private $like;

    public function __construct(Like $like) 
    {
        $this->like = $like;
    }

    public function clickLike($post)
    {
        $postLike = $this->like->where([
            'post_id' => $post,
            'user_id' => auth()->user()->id
        ])->first();

        if($postLike) {
            $this->like->where([
                'post_id' => $post,
                'user_id' => auth()->user()->id
            ])->delete();
        } else {
            $postLike = $this->like->create([
                'post_id' => $post,
                'user_id' => auth()->user()->id
            ]);

            $postLike->save();
        }

        return $postLike;
    }
}