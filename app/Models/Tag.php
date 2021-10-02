<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'state', 'slug'];


    public function videos()
    {
        return $this->belongsToMany('App\Models\Video')->withTimestamps();
    }

    public static function removeTagsFromPivotTable(int $id)
    {
        if ($id > 0) {
            DB::table('tag_video')
                ->where('tag_id', $id)
                ->delete();
        }
    }
}
