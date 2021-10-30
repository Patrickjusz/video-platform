<?php

namespace App\Services;

use App\Models\Video;

interface Search
{
    public static function search(string $term): array;
}

class SearchVideo implements Search
{
    public static function search(string $term): array
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
            ->take(10)
            ->orderByDesc('views_cache')
            ->get();

        foreach ($data as $key => $v) {
            $results[] = ['id' => $v->id, 'value' => $v->name, 'slug' => $v->slug];
        }

        return $results;
    }
}
