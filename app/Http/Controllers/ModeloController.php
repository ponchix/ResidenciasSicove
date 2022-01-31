<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Support\Facades\Cache;

class ModeloController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver modelo | Crear modelo|Editar modelo|Borrar modelo', ['only' => ['index']]);
        $this->middleware('permission:Crear modelo', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar modelo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar modelo', ['only' => ['destroy']]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $modelos = Modelo::all();
        return view('vehiculos/modelos.index', compact(
            'modelos'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Marca::all();
        return view('vehiculos/modelos.crear', compact("marcas"));
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
        request()->validate(
            [
                'modelo' => 'required|unique:modelos',
                'id_marca' => 'required'
            ],
            [
                'modelo.required'=>'El campo Modelo es Obligatorio',
            ]
        );
        $input = $request->all();
        Modelo::create($input);

        // Modelo::create([
        // 'modelo'=>$request->modelo,
        // 'id_marca'=>$request->id_marca,
        // ]);
        return redirect()->route('modelos.index')->with('add', 'agregar');
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
        Modelo::find($id)->delete();
        Cache::flush();
        return redirect()->route('modelos.index')->with('mensaje', 'ok');
    }
}
