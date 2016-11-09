<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Post;

use App\Http\Requests;

class PostController extends Controller
{
    public function index(Post $postQuery)
    {
        $posts = $postQuery->getAllPublishedPosts();
        return view('post.index', ['data' => $posts]);
    }
}
