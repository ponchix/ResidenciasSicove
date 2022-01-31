<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MarcaController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver marca | Crear marca|Editar marca|Borrar marca', ['only' => ['index']]);
        $this->middleware('permission:Crear marca', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar marca', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar marca', ['only' => ['destroy']]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $marcas = Marca::all();
        return view('vehiculos/marca.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vehiculos/marca.crear');
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
                'marca' => 'required|unique:marcas',
            ],
            [
                'marca.required' => 'El campo Marca es obligatorio'
            ]
        );
        $input = $request->all();
        Marca::create($input);
        return redirect()->route('marcas.index')->with('add', 'agregar');;
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
        $marcas = Marca::find($id);
        return view('vehiculos/marca.editar', compact('marcas'));
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
        request()->validate([
            'marca' => 'required|unique:marcas',

        ]);
        $input = $request->all();
        $marcas = Marca::find($id);
        $marcas->update($input);
        return redirect()->route('marcas.index');
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
        Marca::find($id)->delete();
        Cache::flush();
        return redirect()->route('marcas.index')->with('mensaje', 'ok');
    }
}
