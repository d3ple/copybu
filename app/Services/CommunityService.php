<?php

namespace App\Services;

use App\Models\Community;

use App\Helpers\SortHelper;

class CommunityService
{
    private $community;

    public function __construct(Community $community) 
    {
        $this->community = $community;
    }

    public function index()
    {
        return $this->community->all();
    }

    public function store(object $data)
    {
        $community = $this->community->create([
            'alias' => $data->alias,
            'name' => $data->name,
            'description' => $data->description,
            'user_id' => auth()->user()->id,
        ]);
        $community->save();

        return $community;
    }

    public function show($community, $sort_type)
    {
        $sort = SortHelper::defineSortType($sort_type);
        $query = $community->posts->where('is_published', '1');
        $query = $sort[1] === 'asc' ? $query->sortBy($sort[0]) : $query->sortByDesc($sort[0]);
        return $query;
    }
}