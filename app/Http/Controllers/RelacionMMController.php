<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modelo;

class RelacionMMController extends Controller
{
    //

public function index(){
    $marcas=Modelo::all();

    return view('perfil',compact('marcas'));
}

}
