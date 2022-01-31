<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use Illuminate\Http\Request;
use App\Models\Conductor;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ConductorController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver conductor | Crear conductor|Editar conductor|Borrar conductor', ['only' => ['index']]);
        $this->middleware('permission:Crear conductor', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar conductor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar conductor', ['only' => ['destroy']]);
        $this->middleware('permission:Perfil conductor', ['only' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$conductores = Conductor::all();
        $conductores=Conductor::where('status','<',3)->get();
        return view('conductores.index', compact('conductores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $conductores = DB::table('users')
            ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
            ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('users.name')
            ->where('roles.name', '=', 'Conductor')
            ->get();
        return view('conductores.crear', compact('conductores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'imagen' => 'required|mimes:png,jfif,jpeg,jpg',
                'NombreConductor' => 'required',
                'APaterno' => 'required',
                'AMaterno' => 'required',
                'edad' => 'required',
                'direccion' => 'required',
                'telefono' => 'required',
                'NoLiciencia' => 'required|unique:conductors',
                'fecha_exp' => 'required',
                'tipoLicencia' => 'required',

            ],
            [
                'imagen.required'=>'La Foto del conductor es obligatoria',
                'imagen.mimes'=>'El formato del imagen debe ser: jpeg,jpg,jfif o png',
                'NombreConductor.required'=>'El campo Nombre es obligatorio',
                'APaterno.required'=>'Apellido Paterno es obligatorio',
                'AMaterno.required'=>'Apellido Materno es obligatorio',
                'edad.required'=>'El campo Edad es obligatorio',
                'direccion.required'=>'El campo Direccion es obligatoria',
                'telefono.required'=>'El campo Telefono es obligatorio',
                'NoLiciencia.required'=>'El campo No. de licencia es obligatorio',
                'fecha_exp.required'=>'El campo Fecha de Expiracion es obligatorio',
                'NoLiciencia.unique'=>'La licencia ya esta registrada',
                'tipoLicencia.required'=>'El Tipo de Licencia es obligatorio',
            ]
        );
        $conductores = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaImg = 'conductor/';
            $imagenConductor = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenConductor);
            $conductores['imagen'] = "$imagenConductor";
        }
        Conductor::create($conductores);
        Cache::flush();
        return redirect()->route('conductores.index')->with('add', 'agregar');
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
        $conductor = Conductor::findOrFail($id);
        $asignaciones = DB::table('assignments')
            ->join('conductors', 'assignments.conductor', '=', 'conductors.id')
            ->join('vehiculos', 'vehiculos.id', '=', 'assignments.vehiculo')
            ->select('assignments.*', 'vehiculos.NombreVehiculo')
            ->where('assignments.conductor', '=', $id)
            ->get();
        return view('conductores.show', compact(
            'conductor',
            'asignaciones'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $conductores = Conductor::findorFail($id);

        return view('conductores.editar', compact('conductores'));
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
        request()->validate(
            [
                'imagen' => 'mimes:png,jfif,jpeg,jpg',
                'NombreConductor' => 'required',
                'APaterno' => 'required',
                'AMaterno' => 'required',
                'edad' => 'required|numeric',
                'direccion' => 'required',
                'telefono' => 'required',
                'NoLiciencia' => 'required',
                'fecha_exp' => 'required',
                'tipoLicencia' => 'required',

            ],
            [
                'imagen'=>'La Foto del conductor es obligatoria',
                'imagen.mimes'=>'El formato del imagen debe ser: jpeg,jpg,jfif o png',
                'NombreConductor.required'=>'El campo Nombre es obligatorio',
                'APaterno.required'=>'Apellido Paterno es obligatorio',
                'AMaterno.required'=>'Apellido Materno es obligatorio',
                'edad.required'=>'El campo Edad es obligatorio',
                'direccion.required'=>'El campo Direccion es obligatoria',
                'telefono.required'=>'El campo Telefono es obligatorio',
                'NoLiciencia.required'=>'El campo No. de licencia es obligatorio',
                'fecha_exp.required'=>'El campo Fecha de Expiracion es obligatorio',
                'NoLiciencia.unique'=>'La licencia ya esta registrada',
                'tipoLicencia.required'=>'El Tipo de Licencia es obligatorio',
            ]);
        $input = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaImg = 'conductor/';
            $imagenConductor = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenConductor);
            $input['imagen'] = "$imagenConductor";
        } else {
            unset($input['imagen']);
        }
        $conductores = Conductor::findorFail($id);
        $conductores->update($input);
        Cache::flush();
        return redirect()->route('conductores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Conductor::where('id',$id)->update([
            'status'=>3,
                    ]);
       // Conductor::find($id)->delete();
        Cache::flush();
        return redirect()->route('conductores.index')->with('mensaje', 'ok');
    }

    public function drivers_update(Request $request, $id)
    {
        $conductor = Conductor::findorFail($id);
        $conductor->update([
            'status' => $request->value,
        ]);
        $edit_status = $request->value;
        return $edit_status;
    }
}
