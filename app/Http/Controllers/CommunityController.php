<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;

use App\Http\Requests\StoreCommunityRequest;

use App\Services\CommunityService;

class CommunityController extends Controller
{
    private $communityService;

    public function __construct(CommunityService $communityService) 
    {   
        $this->communityService = $communityService;
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
        return view('new-community');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreCommunityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommunityRequest $request)
    {
        $community = $this->communityService->store($request);
        return redirect('/communities/'.$community->alias)->with('status', 'Сообщество успешно создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function show(Community $community, Request $request)
    {
        $sort = $request->input('sort', '');
        return view('community', ['community' => $community, 'posts' => $this->communityService->show($community, $sort) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function edit(Community $community)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Community $community)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Community  $community
     * @return \Illuminate\Http\Response
     */
    public function destroy(Community $community)
    {
        //
    }
}
