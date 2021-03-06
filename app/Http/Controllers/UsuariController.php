<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariController extends Controller
{
    /**
     * Retorna la informaciĆ³ de l'usuari autenticat.
     *
     * @return \Illuminate\Http\Response
     */
    public function me()
    {
        $me = Auth::user();

        return response()->json(["user" => $me]);
    }
}
