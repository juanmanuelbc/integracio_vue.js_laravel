<?php

namespace App\Http\Controllers;

use App\Models\TComentari;
use Illuminate\Http\Request;

class ComentariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($idPost)
    {
        $comentaris = TComentari::where('idPost', $idPost)->get();

        return response()->json($comentaris);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idPost)
    {
        $request->validate([
            'text' => ['string', 'required']
        ]);
        
        $comentari = new TComentari();

        $comentari->text = $request->input('text');

        $comentari->idPost = $idPost;

        $comentari->save();

        return response()->json($comentari);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPost, $id)
    {
        $comentari = TComentari::findOrFail($id);

        return response()->json($comentari);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPost, $id)
    {
        $request->validate([
            'text' => ['string', 'required']
        ]);
        
        $comentari = TComentari::findOrFail($id);

        $comentari->text = $request->input('text');

        $comentari->save();

        return response()->json($comentari);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPost, $id)
    {
        $comentari = TComentari::findOrFail($id);

        $comentari->delete();

        return response()->json($comentari);
    }
}
