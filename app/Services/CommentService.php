<?php

namespace App\Services;

use App\Models\Comment;

class CommentService
{
    private $comment;

    public function __construct(Comment $comment) 
    {
        $this->comment = $comment;
    }

    public function store(object $data)
    {
        $comment = $this->comment->create([
            'text' => $data->text,
            'post_id' => $data->post_id,
            'parent_id' => $data->parent_id,
            'user_id' => auth()->user()->id,
        ]);
        $comment->save();

        return $comment;
    }

    public function update($comment, $text)
    {
        $comment->text = $text;
        $comment->save();

        return $comment;
    }
}