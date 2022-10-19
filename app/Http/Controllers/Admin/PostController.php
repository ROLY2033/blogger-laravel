<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File; 
use App\Models\Image;
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
    public function store(PostRequest $StorePostRequest)
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
        $this->authorize('author', $post);
        $categories = Category::pluck('name', 'id');
        $tags = Tag::all();

        return view('admin.posts.edit', compact('post' , 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, Post $post)
    {
        //
        $this->authorize('author', $post);

        $post->update($request->all());
      
        // $images = Image::where('imageable_id' ,'=', $post->image->imageable_id)->get();
      
     
        if($request->file('file')){
                    
                    // foreach ($files as $file) {
                    $url = Storage::put("public/posts" , $request->file('file'));
                    
                    if($post->image){
                                // Storage::delete($post->image->url);
                                $post->image()->update([
                                    'url' => $url
                                ]);
                                

                                // $post->image()->create([
                                //     'url' => $url
                                // ]);
       
                    }    
                    else{
                        $post->image()->create([
                            'url' => $url
                        ]);
                    }
                // }    
                
            }
            $tags = $request->tags;
            if($tags){
                // $post->tags()->unset($request->tags);

                // sincronizar la etiqueta con sync
                $post->tags()->sync($tags);
                
            }
       
    //    return $files;
        return redirect()->route('admin.posts.edit', compact('post', 'tags'))->with('info' , 'el post  se actualizo correctamente');
        // return $request->tags;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // foreach ($post as $p) {
        //     #
        // }
        // $store = Post::findOrFail($post);

        // $image_path = app_path("{$store->image->url}");


        // if(File::exists($image_path)){
        //         unlink($image_path);
        // }
        $this->authorize('author', $post);

        $post->delete();
        $images = Image::where('imageable_id' ,'=', $post->image->imageable_id)->get();
        foreach ($images as $image) {
            Storage::delete($image->url);

        }
       
        // File::delete($image_path);

        return redirect()->route('admin.posts.index')->with('info', 'el post se borro correactamente');
    }
}