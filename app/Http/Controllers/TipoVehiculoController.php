<?php

namespace App\Http\Controllers;

use App\Models\TipoVehiculo;
use Illuminate\Http\Request;

class TipoVehiculoController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver tipo | Crear tipo|Editar tipo|Borrar tipo', ['only' => ['index']]);
        $this->middleware('permission:Crear tipo', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar tipo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar tipo', ['only' => ['destroy']]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tipos = TipoVehiculo::all();
        return view('vehiculos/Tipos.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vehiculos/Tipos.crear');
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
        request()->validate([
            'Nombre' => 'required',

        ],
        [
            'Nombre.required'=>'El campo Tipo de Vehiculo es obligatorio'
        ]);
        $input = $request->all();
        TipoVehiculo::create($input);
        return redirect()->route('tipos.index')->with('add', 'agregar');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function show(TipoVehiculo $tipoVehiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $tipos = TipoVehiculo::find($id);
        return view('vehiculos/Tipos.editar', compact('tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate(
            [
                'Nombre' => 'required',

            ],
            [
                'Nombre.required'=>'El campo Tipo de Vehiculo es obligatorio'
            ]
        );
        $input = $request->all();
        $tipos = TipoVehiculo::find($id);
        $tipos->update($input);
        return redirect()->route('tipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoVehiculo  $tipoVehiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        TipoVehiculo::find($id)->delete();
        return redirect()->route('tipos.index')->with('mensaje', 'ok');
    }
}
