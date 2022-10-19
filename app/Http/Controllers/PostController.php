<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;

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
       
        $posts = Post::where('status' , 2)->latest('id')->paginate(5);
        
        return view('posts.index' , compact('posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d, o  ');
    }
    
    public function getUpdatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('M d, o  ');
    }

    public function show(Post $post)
    {
        //
        $this->authorize('published', $post);
        $user = User::where('id' , '=' , $post->user_id);
        
        $images = Image::where('imageable_id' ,'=', $post->image->imageable_id)->get();

        $tiempo = $this->getCreatedAtAttribute($post->created_at);


        $parecidos = Post::where('category_id',    $post->category_id)
                                    ->where('status' , 2 )
                                    ->latest('id')
                                    ->where('id', '!=', $post->id)
                                    ->take(4)
                                    ->get();
        return  view('posts.show' , compact('post' , 'parecidos', 'user', 'images' , 'tiempo'));
        

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function category(Category $category){
        $posts = Post::where('category_id' , $category->id)
                        ->where('status', 2)
                        ->latest('id')
                        ->paginate(3);
        return view('posts.category', compact('posts' , 'category'));
    }
    public function tag(Tag $tag){
       
        $posts =  $tag->posts()->where('status' ,2)->latest('id')->paginate(3);
        return view('posts.tag' , compact('posts' , 'tag'));
    }
}
