<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Post::all();
        return view('post.index_post', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.add_post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [ 
                'id' => 'bail|required|unique:tb_album',
                'title' => 'required',
             ],
             [ 
                'id.required' => 'ID wajib diisi',
                'id.unique' => 'Nama ID sudah ada',
                'title.required' => 'Judul wajib diisi'
            ]
        ); 
        Post::create([ 
            'id' => $request->id, 
            'date' => $request->date, 
            'slug' => $request->slug, 
            'title' => $request->title, 
            'text' => $request->text, 
            'cat_id' => $request->cat_id, 
         ]); 
             return redirect('/post'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $row = Post::findOrFail($id); 
        return view('post.edit_post', compact('row'));
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
        $request->validate(
            [ 
                'id' => 'bail|required',
                'title' => 'required',
             ],
             [ 
                'id.required' => 'ID wajib diisi',
                'title.required' => 'Judul wajib diisi'
            ]
        ); 
        
        $row = Post::findOrFail($id);
        $row->update([
            'id' => $request->id, 
            'date' => $request->date,
            'slug' => $request->slug,
            'title' => $request->title, 
            'text' => $request->text, 
            'cat_id' => $request->cat_id, 
         ]); 
             return redirect('/post'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Post::findOrFail($id);
        $row->delete();

        return redirect('/post');
    }
}
