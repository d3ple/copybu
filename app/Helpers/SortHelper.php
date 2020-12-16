<?php

namespace App\Helpers;

class SortHelper
{
    public static function defineSortType($sort_type)
    {
        switch ($sort_type) {
            case 'date':
                $sortBy = 'updated_at';
                $sortType = 'desc';
                break;
            case 'max-rating':
                $sortBy = 'rating';
                $sortType = 'desc';
                break;
            case 'min-rating':
                $sortBy = 'rating';
                $sortType = 'asc';
                break;
            default:
                $sortBy = 'updated_at';
                $sortType = 'desc';
        }

        return [$sortBy, $sortType];
    }
}