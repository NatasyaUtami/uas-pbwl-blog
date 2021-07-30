<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photos;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = Photos::all();
        return view('photos.index_photos', compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('photos.add_photos');
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
        Photos::create([ 
            'id' => $request->id, 
            'date' => $request->date, 
            'title' => $request->title, 
            'text' => $request->text, 
            'post_id' => $request->post_id, 
         ]); 
             return redirect('/photos'); 
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
        $row = Photos::findOrFail($id); 
        return view('photos.edit_photos', compact('row'));
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
        
        $row = Photos::findOrFail($id);
        $row->update([
            'id' => $request->id, 
            'date' => $request->date, 
            'title' => $request->title, 
            'text' => $request->text, 
            'post_id' => $request->post_id, 
         ]); 
             return redirect('/photos'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $row = Photos::findOrFail($id);
        $row->delete();

        return redirect('/photos');
    }
}
