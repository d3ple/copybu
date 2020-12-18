<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

use App\Http\Requests\StorePostRequest;

use App\Services\PostService;
use App\Services\CommunityService;
use App\Services\TagService;
use App\Services\LikeService;

class PostController extends Controller
{
    private $postService;
    private $communityService;
    private $tagService;
    private $likeService;

    public function __construct(PostService $postService, CommunityService $communityService, TagService $tagService, LikeService $likeService) 
    {   
        $this->postService = $postService;
        $this->communityService = $communityService;
        $this->tagService = $tagService;
        $this->likeService = $likeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', '');
        $posts = $this->postService->index($sort);
        $communities = $this->communityService->index();

        return view('main', ['posts' => $posts, 'communities' => $communities]);
    }

    public function showOwnPosts(Request $request)
    {
        $sort = $request->input('sort', '');
        $posts = $this->postService->showOwnPosts($sort);
        $communities = $this->communityService->index();

        return view('my-posts', ['posts' => $posts, 'communities' => $communities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $communities = $this->communityService->index();
        $tags = $this->tagService->index();

        return view('new-post', ['communities' => $communities, 'tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        $post = $this->postService->store($request);
        return redirect('/posts/'.$post->id)->with('status', 'Пост добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $communities = $this->communityService->index();
        $tags = $this->tagService->index();

        $viewed_posts = explode(",", Cookie::get('viewed_posts'));
        array_push($viewed_posts, strval($post->id));
        $viewed_posts_uniq = array_unique($viewed_posts);
        $viewed_posts_str = implode(",", $viewed_posts_uniq);        
        Cookie::queue('viewed_posts', $viewed_posts_str, 2147483647);

        return view('post', ['post' => $post, 'communities' => $communities, 'tags' => $tags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StorePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, Post $post)
    {
        $post->update($request->all());
        $post->tags()->sync($request->tags);
        return redirect()->back()->with('status', 'Пост обновлен');
    }

    public function like(Request $request, Post $post)
    {
        $this->likeService->clickLike($post->id);
        return redirect()->back()->with('status', 'Лайк!!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
