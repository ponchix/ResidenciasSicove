<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

use Illuminate\Support\Facades\Cache;

class ProveedoresController extends Controller
{
    public function __construct()  
    {
        $this->middleware('permission:Ver proveedor | Crear proveedor|Editar proveedor|Borrar proveedor', ['only' => ['index']]);
        $this->middleware('permission:Crear proveedor', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar proveedor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar proveedor', ['only' => ['destroy']]);
       
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.crear', compact('proveedores'));
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
                'NombreProveedor' => 'required',
                'RFC' => 'required | unique:proveedors|min:13',
                'TelefonoP' => 'required|min:10|numeric',
                'Domicilio' => 'required',
                'correoP' => 'required|email',
                'nombreContacto' => 'required',
                'TelefonoC' => 'required|min:10|numeric',
                'correo' => 'required|email',
            ],
            [
                'NombreProveedor.required'=>'El campo Nombre es obligatorio',
                'RFC.required'=>'El campo RFC es obligatorio',
                'RFC.unique'=>'El RFC ya esta registrado',
                'RFC.min'=>'El RFC debe contener 13 caracteres',
                'TelefonoP.required'=>'El campo Telefono Fijo es obligatorio',
                'TelefonoP.min'=>'Telefono Fijo: Deben ser al menos 10 digitos',
                'TelefonoP.numeric'=>'Telefono fijo: Solo acepta numeros',
                'Domicilio.required'=>'El campo Domicilio es obligatorio',
                'correoP.required'=>'El Correo Electronico es obligatorio',
                'correoP.email'=>'Correo invalido',
                'nombreContacto.required'=>'El campo Nombre de Contacto es obligatorio',
                'TelefonoC.required'=>'El telefono de contacto directo es obligatorio',
                'TelefonoC.numeric'=>'Telefono solo acepta numeros',
                'TelefonoC.min'=>'Telefono: Deben ser al menos 10 digitos',
                'correo.required'=>'El correo de contacto director es obligatorio',
                'correo.email'=>'El correo de contacto directo no es valido',
            ]
        );
        $proveedores = $request->all();
        Proveedor::create($proveedores);
        Cache::flush();
        return redirect()->route('proveedores.index')->with('add', 'agregar');
    }



    /**
     * Display the specified resource.eo
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

        $proveedores = Proveedor::find($id);
        return view('proveedores.editar', compact('proveedores'));
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
        request()->validate([
            'NombreProveedor' => 'required',
            'RFC' => 'required | unique:proveedors',
            'TelefonoP' => 'required',
            'Domicilio' => 'required',
            'correoP' => 'required|email',
            'nombreContacto' => 'required',
            'TelefonoC' => 'required',
            'correo' => 'required|email',
        ],
        [
            'NombreProveedor.required'=>'El campo Nombre es obligatorio',
            'RFC.required'=>'El campo RFC es obligatorio',
            'RFC.unique'=>'El RFC ya esta registrado',
            'TelefonoP.required'=>'El campo Telefono Fijo es obligatorio',
            'Domicilio.required'=>'El campo Domicilio es obligatorio',
            'correoP.required'=>'El Correo Electronico es obligatorio',
            'correoP.email'=>'Correo invalido',
            'nombreContacto.required'=>'El campo Nombre de Contacto es obligatorio',
            'TelefonoC.required'=>'El telefono de contacto directo es obligatorio',
            'correo.required'=>'El correo de contacto director es obligatorio',
            'correo.email'=>'El correo de contacto directo no es valido',
        ]);

        $prov = $request->all();
        $proveedores = Proveedor::find($id);
        $proveedores->update($prov);
        Cache::flush();
        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Proveedor::find($id)->delete();
        Cache::flush();
        return redirect()->route('proveedores.index')->with('mensaje', 'ok');
    }
}
