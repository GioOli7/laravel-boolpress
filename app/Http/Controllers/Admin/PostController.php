<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required',
        ]);

        $data = $request->all();

        $new_post = new Post();

        $data['slug'] = Str::slug($data['title'], '-');

        $new_post->fill($data);
        
        $new_post->save();

        return redirect()->route('admin.posts.show', $new_post->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        if($post) {
            return view('admin.posts.show', compact('post'));
        }

        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validation
        $request->validate([
            'title' => ['required',
            Rule::unique('posts')->ignore($id),
            'max:255'
        ],
            'content' => 'required',
        ], [
            'required' => 'The :attribute is required, so...',
            'unique' => 'There is already another post with the title :attribute',
            'max' => 'Max :max characters allowed for the :attribute'
        ]);

        $data = $request->all();

        $post = Post::find($id);

        $data['slug'] = Str::slug($data['title'], '-');

        $post->update($data); //fillable in model!!

        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
        $post->delete();

        return redirect()->route('admin.posts.index')->with('deleted', $post->title);
    }
}
