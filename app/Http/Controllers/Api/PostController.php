<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
   /**
    * Get posts
    */

    public function index() {
        // $posts = Post::all();

        $posts = Post::paginate(3);

        return response()->json($posts);

    }

    /**
     * Get post details by slug
     */

     public function show($slug) {
        
        $post = Post::where('slug', $slug)->with(['category', 'tag'])->first();

        return response()->json($post);
     }
}
