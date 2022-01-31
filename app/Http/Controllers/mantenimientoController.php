<?php

namespace App\Http\Controllers;

use App\Models\mantenimiento;
use App\Models\Mecanico;
use App\Models\Proveedor;
use App\Models\Service;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class mantenimientoController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver mantenimiento | Crear mantenimiento|Editar mantenimiento|Borrar mantenimiento', ['only' => ['index']]);
        $this->middleware('permission:Crear mantenimiento', ['only' => ['create', 'store','mantenimiento']]);
        $this->middleware('permission:Editar mantenimiento', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar mantenimiento', ['only' => ['destroy']]);
        $this->middleware('permission:Detalles mantenimiento', ['only' => ['show']]);
        $this->middleware('permission:Alta mantenimiento', ['only' => ['alta_update','alta_edit']]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mantenimientos = mantenimiento::all()->sortBy('status');
         return view('mantenimiento.index', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $vehiculos = VehiculoModel::where('StatusInicial', 2)->get();
        $servicios = Service::all();
        $proveedores = Proveedor::all();
        $mecanicos = Mecanico::all();
        return view('mantenimiento.crear', compact('vehiculos', 'servicios', 'proveedores', 'mecanicos'));
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
                'mecanico'=>'required',
                'fecha_inicio' => 'required',
                'hora_entrada' => 'required',
                'vehiculo' => 'required',
                'odometro' => 'required|numeric',
                'servicios' => 'required',
                'costo_partes' => 'required|numeric',
                'mano_obra' => 'required|numeric',
                'total',
                'referencia_man' => 'required|unique:mantenimientos',
                'tipo_man' => 'required',
                'proveedor' => 'required',
                'comentario',
                'imagen_man' => 'required',
            ],
            [
                'mecanico.required'=>'El campo Mecanico es obligatorio',
                'fecha_inicio.required'=>'El campo Fecha de Inicio es obligatorio',
                'servicios.required'=>'Seleccione los servicios',
                'costo_partes.required'=>'El campo Costos Partes/Refacciones es obligatorio',
                'mano_obra.required'=>'El campo Mano de Obra es obligatorio',
                'referencia_man.required'=>'El campo Referencia es obligatorio',
                'tipo_man.required'=>'Tipo de mantenimiento es obligatorio',
                'proveedor.required'=>'Proveedor es obligatorio',
                'imagen_man.required'=>'La imagen es obligatoria',
            ]
        );
        // $mantenimiento=$request->all();
        $imagen_man = "";
        if ($imagen_man = $request->file('imagen_man')) {
            $rutaImg = 'mantenimiento/';
            $imagenMantenimiento = date('YmdHis') . "." . $imagen_man->getClientOriginalExtension();
            $imagen_man->move($rutaImg, $imagenMantenimiento);
            $mantenimiento['imagen_man'] = "$imagenMantenimiento";
        }

        // $imagen_man="";
        // if($request->file('imagen_man')){
        //     $imagen_man=$request->file('imagen_man')->store('mantenimiento','public');
        // }
        $mantenimiento = mantenimiento::create(
            [
                'mecanico' => $request->mecanico,
                'fecha_inicio' => $request->fecha_inicio,
                'hora_entrada' => $request->hora_entrada,
                'vehiculo' => $request->vehiculo,
                'odometro' => $request->odometro,
                //'servicios'=>$request->servicios,
                'costo_partes' => $request->costo_partes,
                'mano_obra' => $request->mano_obra,
                'total' => $request->total,
                'referencia_man' => $request->referencia_man,
                'tipo_man' => $request->tipo_man,
                'proveedor' => $request->proveedor,
                'comentario' => $request->comentario,
                'imagen_man' => $imagenMantenimiento,
            ]

        );
        $vehiculo = $request->input('vehiculo');
        // mantenimiento::create($mantenimiento);
        VehiculoModel::where('id', $vehiculo)->update([
            'StatusInicial' => 4
        ]);
        $mantenimiento->servicios()->attach($request->servicios);
        Cache::flush();
        return redirect()->route('servicios.index')->with('add', 'agregar');;
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
        // $vehiculo=DB::table('vehiculos')
        // ->join('mantenimientos','vehiculos.id','=','mantenimientos.vehiculo')
        // ->select('vehiculos.*')
        // ->where('mantenimientos.id','=',$id)
        // ->get();
        // dd($vehiculo);
        $mantenimiento = mantenimiento::findorFail($id);
        $servicios = DB::table('mantenimientos')
            ->join('mantenimiento_service', 'mantenimiento_service.mantenimiento_id', '=', 'mantenimientos.id')
            ->join('services', 'services.id', '=', 'mantenimiento_service.service_id')
            ->select('services.nombre')
            ->where('mantenimientos.id', '=', $id)
            ->get();
        return view('mantenimiento.detallado', compact('mantenimiento', 'servicios'));
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
        mantenimiento::find($id)->delete();
        Cache::flush();
        return redirect()->route('servicios.index')->with('mensaje', 'ok');
    }

    public function alta_edit($id)
    {
        $mantenimiento = mantenimiento::find($id);
        return view('mantenimiento.entrega', compact(
            'mantenimiento'
        ));
    }
    public function alta_update(Request $request, $id)
    {
        request()->validate([
            'vehiculo',
            'fecha_alta' => 'required',
            'comentarios_e',
            'hora_alta'
        ]);
        $vehiculo = $request->input('vehiculo');
        VehiculoModel::where('id', $vehiculo)->update([
            'StatusInicial' => 2
        ]);
        mantenimiento::where('id', $id)->update([
            'status' => 2
        ]);
        $input = $request->all();
        $mantenimiento = mantenimiento::find($id);
        $mantenimiento->update($input);
        Cache::flush();
        return redirect()->route('servicios.index');
    }

    //=========================================================
    //Dar mantenimiento desde el vehiculo
    //El id que recibe es del vehiculo
    public function mantenimiento($id)
    {
        $mecanicos = Mecanico::all();
        $vehiculo = VehiculoModel::find($id);
        $odometro = DB::table('assignments')
            ->where('vehiculo', '=', $id)
            ->max('odometro_e');
        $servicios = Service::all();
        $proveedores = Proveedor::all();
        return view('mantenimiento.vehiculo', compact(
            'mecanicos',
            'vehiculo',
            'odometro',
            'servicios',
            'proveedores'
        ));
    }
}
