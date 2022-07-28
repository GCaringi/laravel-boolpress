<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    private $validation = [
        'title' => 'required|string|max:255',
        'content' => 'required|string|max:65535',
        'published' => 'sometimes|accepted',
        'category_id' => 'nullable|exists:categories,id',
        'tags' => 'nullable|exists:tags,id',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posts = $user->posts;

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validation);

        $data = $request->all();
        $tmpPost = new Post();
        $tmpPost->fill($data);

        $tmpPost->published = isset($data['published']);

        $tmpPost->user_id = Auth::id();

        $tmpPost->save();

        if (isset($data['tags'])){
            $tmpPost->tags()->sync($data['tags']);
        }

        return redirect(route('admin.posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if ($post->user_id !== Auth::id()){
            abort(403);
        }

        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()){
            abort(403);
        }
        $tags = Tag::all();
        $categories = Category::all();
        $postTags = $post->tags->map(function($tag){
            return $tag->id;
        })->toArray();

        return view('admin.posts.edit', compact('post', 'categories', 'tags', 'postTags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()){
            abort(403);
        }

        $request->validate($this->validation);
        $data = $request->all();

        $post->fill($data);
        $post->published = isset($data['published']);

        $post->save();
        
        $tags = isset($data['tags']) ? $data['tags'] : [];

        $post->tags()->sync($tags);

        return redirect(route('admin.posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->user_id != Auth::id()){
            abort(403);
        }

        $post->delete();

        return redirect(route('admin.posts.index'));
    }
}
