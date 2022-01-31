<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use App\Models\VehiculoModel;
use App\Models\Conductor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class IncidenteController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver incidente | Crear incidente|Editar incidente|Borrar incidente', ['only' => ['index']]);
        $this->middleware('permission:Crear incidente', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar incidente', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar incidente', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $incidentes = incidente::all();
        $Datas = Incidente::select(DB::raw("COUNT(*) as count"))
            ->whereYear('Fecha_reporte', date('Y'))
            ->groupBy(DB::raw("Month(Fecha_reporte)"))
            ->pluck('count');
        $months = Incidente::select(DB::raw("Month(Fecha_reporte) as month"))
            ->whereYear('Fecha_reporte', date('Y'))
            ->groupBy(DB::raw("Month(Fecha_reporte)"))
            ->pluck('month');

        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $month = $month - 1;
            $datas[$month] = $Datas[$index];
        }
        return view('vehiculos/Incidentes.index', compact('incidentes', 'datas'));
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
        $conductores = Conductor::all();
        return view('vehiculos/Incidentes.crear', compact('vehiculos', 'conductores'));
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
                'vehiculo' => 'required',
                'conductor' => 'required',
                'Fecha_reporte' => 'required',
                'descripcion' => 'required',
                'importancia' => 'required',
                'detallada' => 'required',
                'foto' => 'required',
            ],
            [
                'vehiculo.required'=>'El campo vehiculo es obligatorio',
                'conductor.required'=>'El campo Conductor es obligatorio',
                'Fecha_reporte.required'=>'El campo Fecha de Reporte es obligatorio',
                'descripcion.required'=>'El campo Descripcion Corta es obligatorio',
                'importancia.required'=>'El campo Importancia es obligatorio',
                'detallada.required'=>'La Descripcion detalla es obligatoria y menor a 255 caracteres',
                'foto.required'=>'La Foto es obligatoria',
            ]
        );
        $incidente = $request->all();
        if ($imagen = $request->file('foto')) {
            $rutaImg = 'incidente/';
            $imagenIncidente = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenIncidente);
            $incidente['foto'] = "$imagenIncidente";
        }
        Incidente::create($incidente);
        Cache::flush();
        return redirect()->route('incidentes.index')->with('add', 'agregar');;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function show(incidente $incidente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vehiculos = VehiculoModel::all();
        $conductores = Conductor::all();
        $incidentes = Incidente::find($id);
        return view('vehiculos/Incidentes.editar', compact('incidentes', 'vehiculos', 'conductores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        request()->validate([
            'vehiculo' => 'required',
            'conductor' => 'required',
            'Fecha_reporte' => 'required',
            'descripcion' => 'required',
            'importancia' => 'required',
            'detallada',
            'foto',
        ],
        [
            'vehiculo.required'=>'El campo vehiculo es obligatorio',
            'conductor.required'=>'El campo Conductor es obligatorio',
            'Fecha_reporte.required'=>'El campo Fecha de Reporte es obligatorio',
            'descripcion.required'=>'El campo Descripcion Corta es obligatorio',
            'importancia.required'=>'El campo Importancia es obligatorio',
            'detallada'=>'La Descripcion detalla es obligatoria y menor a 255 caracteres',
            'foto'=>'La Foto es obligatoria',
        ]);
        $incidente = $request->all();
        if ($imagen = $request->file('foto')) {
            $rutaImg = 'incidente/';
            $imagenIncidente = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenIncidente);
            $incidente['foto'] = "$imagenIncidente";
        } else {
            unset($incidente['imagen']);
        }

        $incidentes = Incidente::find($id);
        $incidentes->update($incidente);
        Cache::flush();
        return redirect()->route('incidentes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\incidente  $incidente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Incidente::find($id)->delete();
        Cache::flush();
        return redirect()->route('incidentes.index')->with('mensaje', 'ok');
    }
}
