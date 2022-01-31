<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use App\Models\Conductor;
use App\Models\Fuel;
use App\Models\VehiculoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\Service\Attribute\Required;

use function PHPUnit\Framework\assertNan;
use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\returnSelf;

class AssignmentController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver asignacion | Crear asignacion|Editar asignacion|Borrar asignacion', ['only' => ['index']]);
        $this->middleware('permission:Crear asignacion', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar asignacion', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar asignacion', ['only' => ['destroy']]);
        $this->middleware('permission:Ver archivado', ['only' => ['archivados_index']]);
        $this->middleware('permission:Detalle Asignacion', ['only' => ['show']]);
        $this->middleware('permission:Entrega asignacion', ['only' => ['entrega_edit','entrega_update']]);
        $this->middleware('permission:Asignacion', ['only' => ['asignacion']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $asignaciones = assignment::where('status', '<', 3)->get();
        $asignaciones->sortBy('status');
               return view('asignaciones.index', compact('asignaciones'));
    }

    public function archivados_index()
    {
        $asignaciones = assignment::where('status', 3)->get();
        return view('asignaciones.archivados', compact(
            'asignaciones'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        $vehiculos = VehiculoModel::where('StatusInicial', 2)
            ->get();
        $conductores = Conductor::where('status', 2)->get();

        return view('asignaciones.crear', compact(
            'conductores',
            'vehiculos'
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
                'conductor' => 'required',
                'vehiculo' => 'required',
                'fecha_a' => 'required',
                'fecha_e',
                'odometro_a' => 'required',
                'odometro_e',
                'combustible_a' => 'required',
                'combustible_e',
            ],
            [
                'conductor.required' => 'El conductor es obligatorio',
                'combustible_a.required' => 'El combustible es obligatorio',
            ]
        );
        $input = $request->all();
        $conductor = $request->input('conductor');
        Conductor::where('id', $conductor)->update([
            'status' => 1
        ]);
        $vehiculo = $request->input('vehiculo');
        VehiculoModel::where('id', $vehiculo)->update([
            'StatusInicial' => 1
        ]);
        assignment::create($input);
        Cache::flush();
        return redirect()->route('asignaciones.index')->with('add', 'agregar');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $conductor = DB::table('users')
            ->join('conductors', 'users.id', '=', 'conductors.NombreConductor')
            ->join('assignments', 'conductors.id', '=', 'assignments.conductor')
            ->select('users.name', 'conductors.APaterno')
            ->where('assignments.id', '=', $id)
            ->get();
        $asignacion = assignment::find($id);
        return view('asignaciones.show', compact('asignacion', 'conductor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // $conductores = Conductor::all();
        // $vehiculos = VehiculoModel::all();
        // $asignaciones = assignment::find($id);
        // return view('asignaciones.editar', compact(
        //     'asignaciones',
        //     'conductores',
        //     'vehiculos'
        // ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // request()->validate([
        //     'conductor' => 'required',
        //     'vehiculo' => 'required',
        //     'fecha_a' => 'required',
        //     'fecha_e' => 'required',
        //     'odometro_a' => 'required',
        //     'odometro_e' => 'required',
        //     'combustible_a' => 'required',
        //     'combustible_e' => 'required',
        // ]);
        // $input = $request->all();
        // $asignaciones = assignment::find($id);
        // $asignaciones->update($input);
        // Cache::flush();
        // return redirect()->route('asignaciones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //assignment::find($id)->delete();
        assignment::where('id', $id)->update([
            'status' => 3
        ]);
        Cache::flush();
        return redirect()->route('asignaciones.index')->with('archive', 'ok');
    }

    public function entrega_edit($id)
    {
        $conductores = Conductor::all();
        $asignaciones = assignment::find($id);
        return view('asignaciones.entrega', compact(
            'asignaciones',
            'conductores'
        ));
    }

    public function entrega_update(Request $request, $id)
    {
        $odometro_e = $request->input('odometro_e');
        $odometro_a = $request->input('odometro_a');
        if ($odometro_e < $odometro_a) {
            return back()->with('alert-danger', 'El odometro final NO puede ser menor que el odometro asignado');
        }
        request()->validate([
            'conductor',
            'vehiculo',
            'fecha_e' => 'required',
            'odometro_e' => 'required|numeric',
            'combustible_e' => 'required|numeric',
            'odometro_a',
            'combustible_a'
        ],
        [
            'fecha_e.required'=>'La fecha de entrega es obligatoria',
            'odometro_e.required'=>'El campo Odometro Final es obligatorio',
            'combustible_e.required'=>'El campo Combustible Final es obligatorio',
        ]);
        $conductor = $request->input('conductor');
        Conductor::where('id', $conductor)->update([
            'status' => 2
        ]);
        $vehiculo = $request->input('vehiculo');
        VehiculoModel::where('id', $vehiculo)->update([
            'StatusInicial' => 2
        ]);

        assignment::where('id', $id)->update([
            'status' => 2
        ]);


        $input = $request->all();
        // $final=$request->input('combustible_a')-
        $final=$request->input('combustible_e');
        $input['combustible_a']=$final;
        $asignaciones = assignment::find($id);
        $asignaciones->update($input);
        Cache::flush();
        return redirect()->route('asignaciones.index');
    }

    //Esta funcion recibe el $id del vehiculo NO de la asignacion

    public function asignacion($id)
    {
        
        $conductores = Conductor::where('status', 2)->get();
        $vehiculo = VehiculoModel::find($id);
        $combustible=DB::table('assignments')
        ->select('combustible_a')
        ->where('vehiculo','=',$id)
        ->orderBy('created_at', 'desc')
        ->first();
        $odometro = DB::table('assignments')
        ->where('vehiculo', '=', $id)->max('odometro_e');
   
        if (is_null($combustible)) {
            $combustible=0;
            return view('asignaciones.crear', compact(
                'conductores',
                'vehiculo',
                'odometro',
                'combustible'
            ));
        }elseif($combustible != 'null'){
              return view('asignaciones.crear', compact(
                'conductores',
                'vehiculo',
                'odometro',
                'combustible'
            ));
        }
        // if ($combustible->isEmpty()) {

        //     return view('asignaciones.crear', compact(
        //         'conductores',
        //         'vehiculo',
        //         'odometro',
        //         'combustible'

        //     ));
        // }
        // elseif($combustible->isNotEmpty()){
        //    $combustible;
        //    return view('asignaciones.crear', compact(
        //     'conductores',
        //     'vehiculo',
        //     'odometro',
        //     'combustible'
        // ));
        // }


    }
}
