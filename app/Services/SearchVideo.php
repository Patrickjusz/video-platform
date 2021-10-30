<?php

namespace App\Services;

use App\Models\Video;

interface Search
{
    public static function search(string $term): array;
}

class SearchVideo implements Search
{
    /**
     * Search video by term
     * 
     * @param  string $term
     * @param  int $limit
     * @return array
     */
    public static function search(string $term, int $limit = 10): array
    {
        $results = [];

        $data = Video::where('state', 'public')
            ->where('slug', '!=', '')
            ->where('filename', '!=', '')
            ->where('thumb', '!=', '')
            ->where(function ($query) use ($term) {
                $query->where('name', 'LIKE', '%' . $term . '%')
                    ->orWhere('description', 'LIKE', '%' . $term . '%');
            })
            ->take($limit)
            ->orderByDesc('views_cache')
            ->get();

        foreach ($data as $key => $v) {
            $results[] = ['id' => $v->id, 'value' => $v->name, 'slug' => $v->slug];
        }

        return $results;
    }
}
