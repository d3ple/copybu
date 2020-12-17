<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

use App\Http\Requests\StoreCommentRequest;

use App\Services\CommentService;

class CommentController extends Controller
{
    private $commentService;

    public function __construct(CommentService $commentService) 
    {   
        $this->commentService = $commentService;
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = $this->commentService->store($request);
        return redirect()->to(url()->previous() . '#comment-' . $comment->id)->with('status', 'Комментарий добавлен');
    }

    public function update(Request $request, Comment $comment)
    {
        //
    }
}
