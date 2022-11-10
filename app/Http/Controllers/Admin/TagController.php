<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.edit')->only('edit' , 'update');
    }


    public function index()
    {
        //
        $tags = Tag::all();

        return view('admin.tags.index' , compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $colors = [
            'red' => 'color rojo',
            'yellow' => 'color yellow',
            'pink' => 'color pink',
            'blue' => 'color blue',
            'green' => 'color green',
        ];

        return view('admin.tags.create', compact('colors'))->with('info' , 'se creo la etiqueta');
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
            'name'  => 'required',
            'slug'  => 'required|unique:tags',
            'color'  => 'required'
        ]);
        $tag = Tag::create($request->all());

        return redirect()->route('admin.tags.edit', compact('tag'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
       
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        $colors = [
            'red' => 'color rojo',
            'yellow' => 'color yellow',
            'pink' => 'color pink',
            'blue' => 'color blue',
            'green' => 'color green',
        ];

        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Tag  $tag)
    {
        //
        $request->validate([
            'name'  => 'required',
            'slug'  => "required|unique:tags,slug,$tag->id",
            'color'  => 'required'
        ]);
        $tag->update($request->all());
        
        return redirect()->route('admin.tags.index', $tag)->with('info', 'la etiqueta se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('info' , 'la se ha borrado el tag');

    }
}


// https://youtu.be/75SIMF9z3rs?list=PLZ2ovOgdI-kX3XFj77zlvSQYhJyJSYQWr&t=658