<?php

namespace App\Http\Controllers;

use App\Models\TPost;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = TPost::select()->with('usuari')
                                ->with('categories')
                                ->with('comentaris')->get();

        return response()->json(['posts' => $posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'titol' => ['string', 'required'],
            'imatge' => ['string', 'required'],
            'descripcio' => ['string', 'required'],
            'contingut' => ['string', 'required']
        ]);
        
        $post = new TPost();

        $post->titol = $request->input('titol');
        $post->imatge  = $request->input('imatge');
        $post->descripcio = $request->input('descripcio');
        $post->contingut = $request->input('contingut');

        $post->save();

        return response()->json($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = TPost::findOrFail($id);

        return response()->json(['post' => $post]);
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
        $request->validate([
            'titol' => ['string', 'required'],
            'imatge' => ['string', 'required'],
            'descripcio' => ['string', 'required'],
            'contingut' => ['string', 'required']
        ]);

        $post = TPost::findOrFail($id);

        $post->titol = $request->input('titol');
        $post->imatge  = $request->input('imatge');
        $post->descripcio = $request->input('descripcio');
        $post->contingut = $request->input('contingut');

        $post->save();

        return response()->json($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = TPost::findOrFail($id);

        $post->delete();

        return response()->json($post);
    }
}
