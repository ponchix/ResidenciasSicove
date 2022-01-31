<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use App\Models\Conductor;
use App\Models\Fuel;
use App\Models\Proveedor;
use App\Models\typeFuel;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class FuelController extends Controller
{

    public function __construct()  
    {
        $this->middleware('permission:Ver combustible | Carga combustible|Editar carga|Borrar carga', ['only' => ['index']]);
        $this->middleware('permission:Carga combustible', ['only' => ['create', 'store','combustible']]);
        $this->middleware('permission:Editar carga', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar carga', ['only' => ['destroy']]);
        // $this->middleware('permission:Ver archivado', ['only' => ['archivados_index']]);
        // $this->middleware('permission:Detalle Asignacion', ['only' => ['show']]);
        // $this->middleware('permission:Entrega asignacion', ['only' => ['entrega_edit','entrega_update']]);
        // $this->middleware('permission:Asignacion', ['only' => ['asignacion']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cargas = Fuel::all();
        return view('combustible.index', compact('cargas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vehiculos = VehiculoModel::all();
        $proveedores = Proveedor::all();
        $conductores = Conductor::all();
        $tipos = typeFuel::all();
        // $odometro = DB::table('assignments')
        // ->where('vehiculo', '=', $id)->max('odometro_a');
        return view('combustible.crear', compact(
            'vehiculos',
            'proveedores',
            'conductores',
            'tipos'
        ));
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
                'fecha_carga' => 'required',
                'hora_carga' => 'required',
                'referencia_carga' => 'required|unique:fuels',
                'proveedor' => 'required',
                'conductor' => 'required',
                'tipo_combustible' => 'required',
                'cantidad' => 'required|numeric',
                'costo_uni' => 'required|numeric',
                'odometro' => 'required|numeric',
                'imagen_combustible' => 'required|mimes:jpg,jpeg,pdf',
            ],
            [
                'fecha_carga.required'=>'El campo Fecha es obligatorio',
                'hora.required'=>'El campo Hora es obligatorio',
                'referencia_carga.required'=>'El campo Referencia es obligatorio',
                'proveedor.required'=>'El campo Proveedor es obligatorio',
                'conductor.required'=>'El campo Conductor es obligatorio',
                'tipo_combustible.required'=>'El campo Tipo de Combustible es obligatorio ',
                'cantidad.required'=>'El campo Cantidad es obligatorio',
                'costo_uni.required'=>'El campo Costo unitario es obligatorio',
                'odometro.required'=>'El campo odometro es obligatorio',
                'imagen_combustible.required'=>'La imagen es obligatoria',
                'cantidad.numeric'=>"El campo Cantidad solo acepta numeros",
                'costo_uni.numeric'=>"El campo Costo Unitario solo acepta numeros",
                
            ]
        );
        $combustible=$request->all();
        if ($imagen = $request->file('imagen_combustible')) {
            $rutaImg = 'combustible/';
            $imagen_combustible = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagen_combustible);
            $combustible['imagen_combustible'] = "$imagen_combustible";
        }
        $total=$request->input('cantidad')*$request->input('costo_uni');
        $combustible['total']=$total;
        $vehiculo=$request->input('vehiculo');
        $carga=$request->input('cantidad')+$request->input('carga');
        assignment::where('vehiculo',$vehiculo)
        ->orderBy('created_at', 'desc')
        ->first()
        ->update([ 'combustible_a'=>$carga]);
        Fuel::create($combustible);
        Cache::flush();
        return redirect()->route('combustible-carga.index')->with('add','agregar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuel $fuel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        //
    }

    public function combustible($id)
    {
        $vehiculo = VehiculoModel::find($id);
        $proveedores = Proveedor::all();
        $conductores = Conductor::all();
        $carga=DB::table('assignments')->select('combustible_a')
        ->where('vehiculo','=',$id)->latest()->take(1)->get();
        $tipos = typeFuel::all();
        $odometro = DB::table('assignments')
            ->where('vehiculo', '=', $id)->max('odometro_e');
        return view('combustible.crear', compact(
            'vehiculo',
            'proveedores',
            'conductores',
            'tipos',
            'carga',
        'odometro'
        ));
    }
}
