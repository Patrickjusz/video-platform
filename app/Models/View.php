<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['video_id', 'ip'];

    public function videos()
    {
        return $this->belongsTo('App\Models\Video')->withTimestamps();
    }
}
