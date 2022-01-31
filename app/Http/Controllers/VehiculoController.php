<?php

namespace App\Http\Controllers;

use App\Models\assignment;
use App\Models\incidente;
use Illuminate\Http\Request;
use App\Models\VehiculoModel;
use App\Models\Modelo;
use App\Models\Marca;
use App\Models\Status;
use App\Models\Conductor;
use App\Models\Fuel;
use App\Models\TipoVehiculo;
use Facade\FlareClient\Api;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use PDF;

class VehiculoController extends Controller
{

public function __construct()
    {
        $this->middleware('permission:Ver vehiculo' , ['only' => ['index']]);
        $this->middleware('permission:Crear vehiculo', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar vehiculo', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar vehiculo', ['only' => ['destroy']]);
        $this->middleware('permission:Estado vehiculo', ['only' => ['vehiculos_update']]);
        $this->middleware('permission:Perfil vehiculo', ['only' => ['show']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $vehiculos = VehiculoModel::where('StatusInicial','<',5)->get();
        $estados = Status::all();
        Cache::flush();
        return view('vehiculos.index', compact('vehiculos', 'estados'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tipos = TipoVehiculo::all();
        $estados = Status::all();
        return view('vehiculos.crear', compact('tipos', 'estados'));
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
                'NombreVehiculo' => 'required | unique:vehiculos',
                'TipoVehiculo' => 'required',
                'Marca' => 'required',
                //'StatusInicial'=>'required',
                'fecha_compra' => 'required',
                'Modelo' => 'required',
                'MedidaUso' => 'required',
                'MedidaCombustible' => 'required',
                'anio' => 'required',
                'CompaniaSeguros' => 'required',
                'NoSerie' => 'required |unique:vehiculos',
                'PolizaSeguro' => 'required |unique:vehiculos',
                'Placa' => 'required | unique:vehiculos',
                'Color' => 'required',
                'imagen' => 'required',
                'combustible' => 'required',
                'motor' => 'required',
                'cilindraje' => 'required',
                'cilindrada' => 'required',
                'fecha_poliza' => 'required',
                'factura' => 'required | unique:vehiculos',

            ],
            [
                'NombreVehiculo.required' => 'El Campo Nombre del Vehiculo es obligatorio',
                'TipoVehiculo.required' => 'El campo Tipo de Vehiculo obligatorio',
                'Marca.required' => 'El campo Marca es obligatorio',
                'fecha_compra.required' => 'El campo Fecha de compra es obligatorio',
                'Modelo.required' => 'El campo Modelo es obligatorio',
                'MedidaUso.required' => 'El campo Medida de Uso es obligatorio',
                'MedidaCombustible.required' => 'El campo Medida de Combustble es obligatorio',
                'anio.required' => 'El campo Año es obligatorio',
                'CompaniaSeguros.required' => 'El campo Compañia de Seguros es obligatorio',
                'NoSerie.required' => 'El campo Numero de Serie es obligatorio',
                'PolizaSeguro.required' => 'El campo Poliza es obligatorio',
                'Placa.required' => 'El campo Placa es obligatorio',
                'Color.required' => 'El campo Color es obligatorio',
                'imagen.required' => 'La imagen es Obligatoria',
                'combustible.required' => 'El campo Combustible es obligatorio',
                'motor.required' => 'El campo Motor es obligatorio',
                'cilindraje.required' => 'El campo Cilindraje es obligatorio',
                'cilindrada.required' => 'El campo Cilindrada es obligatorio',
                'fecha_poliza.required' => 'El campo Vigencia Poliza es obligatrio ',
                'factura.required' => 'El campo Factura es obligatorio',
            ]
        );
        $vehiculo = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaImg = 'imagen/';
            $imagenVehiculo = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenVehiculo);
            $vehiculo['imagen'] = "$imagenVehiculo";
        }
        if ($factura = $request->file('factura')) {
            $rutaFac = 'factura/';
            $facturaVehiculo = date('YmdHis') . "." . $factura->getClientOriginalExtension();
            $factura->move($rutaFac, $facturaVehiculo);
            $vehiculo['factura'] = "$facturaVehiculo";
        }
        VehiculoModel::create($vehiculo);
        Cache::flush();
        return redirect()->route('vehiculos.index')->with('add','agregar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $vehiculo = VehiculoModel::findorFail($id);
        $modelo = DB::table('vehiculos')
            ->join('marcas', 'vehiculos.Marca', '=', 'marcas.id')
            ->join('modelos', 'marcas.id', '=', 'modelos.id_marca')
            ->select('modelos.modelo')
            ->where('vehiculos.id', '=', $id)
            ->get();


        $datas = Incidente::select(DB::raw("COUNT(*) as count"))
            ->where('vehiculo', '=', $id)
            // ->groupBy(DB::raw("Month(Fecha_reporte)"))
            ->pluck('count');

            $combustible=Fuel::all();

        $servicios = DB::table('vehiculos')
            ->join('mantenimientos', 'vehiculos.id', '=', 'mantenimientos.vehiculo')
            ->join('mantenimiento_service', 'mantenimientos.id', '=', 'mantenimiento_service.mantenimiento_id')
            ->join('services', 'mantenimiento_service.service_id', '=', 'services.id')
            ->join('mecanicos', 'mantenimientos.mecanico', '=', 'mecanicos.id')
            ->select('services.nombre', 'mantenimientos.*', 'mecanicos.NombreMecanico')
            ->where('vehiculos.id', '=', $id)
            ->get();

        $gastos = DB::table('gastos')
            ->where('vehiculo', $id)
            ->sum('monto');

        $mantenimientos = DB::table('mantenimientos')
            ->where('vehiculo', $id)
            ->sum('total');

        if ($vehiculo->StatusInicial=='5') {
            return abort(404);
        }

        return view('vehiculos.perfil', compact(
            'vehiculo',
            'modelo',
            'datas',
            'servicios',
            'gastos',
            'mantenimientos'
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
        //
        $marcas = Marca::all();
        $modelos = Modelo::all();

        $tipos = TipoVehiculo::all();
        //return view('vehiculos.editar',compact('vehiculoModel'));
        $vehiculos = VehiculoModel::findorFail($id);
        $estados = Status::all();
        if ($vehiculos->StatusInicial=='5') {
            return back()->with('eliminado', 'El vehiculo especificado no se encuentra');
        }else{
            return view('vehiculos.editar', compact(
                'vehiculos',
                'marcas',
                'modelos',
                'tipos',
                'estados'
            ));
        }



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
            'NombreVehiculo' => 'required',
            'TipoVehiculo' => 'required',
            'Marca',
            'StatusInicial' => 'required',
            'fecha_compra' => 'required',
            'Modelo',
            'MedidaUso' => 'required',
            'MedidaCombustible' => 'required',
            'anio' => 'required',
            'CompaniaSeguros' => 'required',
            'NoSerie' => 'required',
            'PolizaSeguro' => 'required',
            'Placa' => 'required',
            'Color' => 'required',
            'imagen',
            'combustible' => 'required',
            'motor' => 'required',
            'cilindraje' => 'required',
            'cilindrada' => 'required',
            'fecha_poliza' => 'required',
            'factura',

        ],
        [
            'NombreVehiculo.required' => 'El Campo Nombre del Vehiculo es obligatorio',
            'TipoVehiculo.required' => 'El campo Tipo de Vehiculo obligatorio',
            'Marca' => 'El campo Marca es obligatorio',
            'fecha_compra.required' => 'El campo Fecha de compra es obligatorio',
            'Modelo' => 'El campo Modelo es obligatorio',
            'MedidaUso.required' => 'El campo Medida de Uso es obligatorio',
            'MedidaCombustible.required' => 'El campo Medida de Combustble es obligatorio',
            'anio.required' => 'El campo Año es obligatorio',
            'CompaniaSeguros.required' => 'El campo Compañia de Seguros es obligatorio',
            'NoSerie.required' => 'El campo Numero de Serie es obligatorio',
            'PolizaSeguro.required' => 'El campo Poliza es obligatorio',
            'Placa.required' => 'El campo Placa es obligatorio',
            'Color.required' => 'El campo Color es obligatorio',
            'imagen' => 'La imagen es Obligatoria',
            'combustible.required' => 'El campo Combustible es obligatorio',
            'motor.required' => 'El campo Motor es obligatorio',
            'cilindraje.required' => 'El campo Cilindraje es obligatorio',
            'cilindrada.required' => 'El campo Cilindrada es obligatorio',
            'fecha_poliza.required' => 'El campo Vigencia Poliza es obligatrio ',
            'factura' => 'El campo Factura es obligatorio',
        ]);
        $input = $request->all();
        if ($imagen = $request->file('imagen')) {
            $rutaImg = 'imagen/';
            $imagenVehiculo = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaImg, $imagenVehiculo);
            $input['imagen'] = "$imagenVehiculo";
        } else {
            unset($input['imagen']);
        }
        if ($factura = $request->file('factura')) {
            $rutaFac = 'factura/';
            $facturaVehiculo = date('YmdHis') . "." . $factura->getClientOriginalExtension();
            $factura->move($rutaFac, $facturaVehiculo);
            $input['factura'] = "$facturaVehiculo";
        } else {
            unset($input['factura']);
        }
        $vehiculos = VehiculoModel::findorFail($id);
        $vehiculos->update($input);
        Cache::flush();
        return redirect()->route('vehiculos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //VehiculoModel::find($id)->delete();
        VehiculoModel::where('id',$id)->update([
            'StatusInicial'=>5,
                    ]);
        Cache::flush();
        return redirect()->route('vehiculos.index')->with('mensaje', 'ok');
    }



    public function vehiculos_update(Request $request, $id)
    {
        $vehiculo = VehiculoModel::findorFail($id);
        $vehiculo->update([
            'StatusInicial' => $request->value,
        ]);
        $edit_status = $request->value;
        return $edit_status;
    }

    // public function vehiculos_asignacion(Request $request,$id){
    //     $vehiculo=VehiculoModel::find($id);
    //     $conductores=Conductor::where('status',2)->get();
    //     return view('vehiculos/asignaciones.asignacion',compact(
    //         'conductores',
    //         'vehiculo'
    //     ));

    // }

    public function pdf_vehiculos()
    {
        $vehiculos=VehiculoModel::all();
        $disponible=VehiculoModel::where('StatusInicial','=',2)->count();
        $asignado=VehiculoModel::where('StatusInicial','=',1)->count();
        $taller=VehiculoModel::where('StatusInicial','=',4)->count();
        $fuera=VehiculoModel::where('StatusInicial','=',3)->count();
        $total=VehiculoModel::where('StatusInicial','!=',5)->count();
        $seguros=DB::select('select  count(companiaseguros) as seguros, NombreVehiculo,CompaniaSeguros FROM vehiculos group by companiaseguros, Nombrevehiculo');
        $polizas=VehiculoModel::selectRaw('id, NombreVehiculo,CompaniaSeguros,DATE(fecha_poliza) as vencimiento')
        ->orderBy('vencimiento','asc')
        ->get()
        ->groupBy('vencimiento');

        $pdf =PDF::loadView('pdfs.vehiculosPDF',['vehiculos'=>$vehiculos,
        'disponible'=>$disponible,
        'asignado'=>$asignado,
        'taller'=>$taller,
        'fuera'=>$fuera,
        'total'=>$total,
        'seguros'=>$seguros,
        'polizas'=>$polizas
    ])->setPaper('letter','portrait')->setWarnings(true);

        return $pdf->stream();
        //return view('pdf.vehiculosPDF',compact('vehiculos'));
    }

    public function pdf_vehiculos_download(){
        $vehiculos=VehiculoModel::all();
        $disponible=VehiculoModel::where('StatusInicial','=',2)->count();
        $asignado=VehiculoModel::where('StatusInicial','=',1)->count();
        $taller=VehiculoModel::where('StatusInicial','=',4)->count();
        $fuera=VehiculoModel::where('StatusInicial','=',3)->count();
        $total=VehiculoModel::where('StatusInicial','!=',5)->count();
        $seguros=DB::select('select  count(companiaseguros) as seguros, NombreVehiculo,CompaniaSeguros FROM vehiculos group by companiaseguros, Nombrevehiculo');
        $polizas=VehiculoModel::selectRaw('id, NombreVehiculo,CompaniaSeguros,DATE(fecha_poliza) as vencimiento')
        ->orderBy('vencimiento','asc')
        ->get()
        ->groupBy('vencimiento');
        $pdf =PDF::loadView('pdfs.vehiculosPDF',['vehiculos'=>$vehiculos,
        'disponible'=>$disponible,
        'asignado'=>$asignado,
        'taller'=>$taller,
        'fuera'=>$fuera,
        'total'=>$total,
        'seguros'=>$seguros,
        'polizas'=>$polizas
    ])->setPaper('letter','portrait')->setWarnings(true);
    return $pdf->download('vehiculosPDFDownload.pdf');
    }

}
