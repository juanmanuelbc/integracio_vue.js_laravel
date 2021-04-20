<?php

namespace App\Http\Controllers;

use App\Models\ACategoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ACategoria::all();

        return response()->json(['categories' => $categories]);
    }
}
