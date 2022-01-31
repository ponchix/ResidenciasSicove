<?php

namespace App\Http\Controllers;

use App\Models\incidente;
use App\Models\VehiculoModel;
use App\Models\gasto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class ReporteController extends Controller
{
    //
    public function index()
    {
        return view('pdfs.reportes');
    }

    ///PDFs de incidentes
    public function pdf_incidentes()
    {
        $incidentes = incidente::all();
        $recurrentes = DB::select('SELECT NombreConductor,count(conductor) as total FROM incidentes INNER JOIN conductors ON incidentes.conductor = conductors.id group by conductor');
        $vehiculos = DB::select('SELECT NombreVehiculo,count(vehiculo) as total FROM incidentes INNER JOIN vehiculos ON incidentes.vehiculo = vehiculos.id group by vehiculo');
        if (count($incidentes) == 0) {
            return back()->with('alert-danger', 'No se puede generar reporte, ya que no existen registros');
        } else {
            $pdf = PDF::loadView('pdfs.incidentePDF', [
                'incidentes' => $incidentes,
                'recurrentes' => $recurrentes,
                'vehiculos' => $vehiculos,
            ])->setPaper('letter', 'portrait')->setWarnings(true);

            return $pdf->stream();
        }
    }
    public function pdf_incidentes_download()
    {
        $incidentes = incidente::all();
        $recurrentes = DB::select('SELECT NombreConductor,count(conductor) as total FROM incidentes INNER JOIN conductors ON incidentes.conductor = conductors.id group by conductor');
        $vehiculos = DB::select('SELECT NombreVehiculo,count(vehiculo) as total FROM incidentes INNER JOIN vehiculos ON incidentes.vehiculo = vehiculos.id group by vehiculo');
        if (count($incidentes) == 0) {
            return back()->with('alert-danger', 'No se puede generar reporte, ya que no existen registros');
        } else {
            $pdf = PDF::loadView('pdfs.incidentePDF', [
                'incidentes' => $incidentes,
                'recurrentes' => $recurrentes,
                'vehiculos' => $vehiculos,
            ])->setPaper('letter', 'portrait')->setWarnings(true);

            return $pdf->download('incidentesPDFDownload.pdf');
        }
    }
        ///PDFs de gastos
        public function pdf_gastos()
        {
            $gastos = gasto::all();
            $recurrentes = DB::select('SELECT NombreProveedor,count(proveedor) as total FROM gastos INNER JOIN proveedors ON gastos.proveedor = proveedors.id group by proveedor');
            $conductor = DB::select('SELECT NombreConductor,count(conductor) as total FROM gastos INNER JOIN conductors ON gastos.conductor = conductors.id group by conductor');
            $vehiculos = DB::select('SELECT NombreVehiculo,count(vehiculo) as total FROM gastos INNER JOIN vehiculos ON gastos.vehiculo = vehiculos.id group by vehiculo');
            if (count($gastos) == 0) {
                return back()->with('alert-danger', 'No se puede generar reporte, ya que no existen registros');
            } else {
                $pdf = PDF::loadView('pdfs.gastosPDF', [
                    'gastos' => $gastos,
                    'recurrentes' => $recurrentes,
                    'vehiculos' => $vehiculos,
                    'conductor' => $conductor,
                ])->setPaper('letter', 'portrait')->setWarnings(true);
    
                return $pdf->stream();
            }
        }
}
