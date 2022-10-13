<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Storage;

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

        return  view('admin.posts.index' , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $StorePostRequest)
    {
        // return 
       
        $post = Post::create($StorePostRequest->all());

        $files = $StorePostRequest->file('file');
        
       
            if($StorePostRequest->file('file')){
                
                foreach ($files as $file) {
                $url = Storage::put("public/posts" , $file);
                $post->image()->create([
                        'url' => $url
                    ]);
                }
            }
        


        if($StorePostRequest->tags){
            $post->tags()->attach($StorePostRequest->tags);
        }
        return redirect()->route('admin.posts.edit', compact('post'));
    }

        // public function attachPosts($posts) {
        //     $this->posts()->attach($posts);
        // }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        return  view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        // no funcion con redirect solo con view
        return view('admin.posts.edit', compact('post'));
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
        //
        return redirect()->route('admin.posts.edit', $request)->with('info' , 'la categoria se actualizo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        
        $post->delete();
        return redirect()->route('admin.posts.index')->with('info', 'el post se borro correactamente');
    }
}
