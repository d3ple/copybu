<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

use App\Services\PostService;
use App\Services\TagService;
use App\Services\CommunityService;

class TagController extends Controller
{
    private $postService;
    private $communityService;
    private $tagService;

    public function __construct(PostService $postService, CommunityService $communityService, TagService $tagService) 
    {   
        $this->postService = $postService;
        $this->communityService = $communityService;
        $this->tagService = $tagService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    public function showPosts(Request $request, $idsStr)
    {
        $ids = explode(",", $idsStr);

        $tags = $this->tagService->index();
        $communities = $this->communityService->index();

        $sort = $request->input('sort', '');
        $posts = $this->tagService->showPosts($ids, $sort);

        return view('tags', ['tags' => $tags, 'posts' => $posts, 'communities' => $communities, 'ids' => $ids]);
    }

    public function searchPosts(Request $request)
    {
        $tags = $request->input('tags', []);
        $tagsStr = implode(",", $tags);
        return redirect('/tags/' . $tagsStr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
