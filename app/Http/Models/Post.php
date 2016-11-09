<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function getAllPublishedPosts()
    {
        return Post::latest('published_at')->published()->get();
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now())
            ->where('published', '=', 1);
    }
}
