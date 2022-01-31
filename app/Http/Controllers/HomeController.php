<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $gastos=DB::table('gastos')
        ->sum('monto');
        $mantenimientos=DB::table('mantenimientos')
        ->sum('total');
        $total=$gastos+$mantenimientos;
        return view('home',compact('gastos','total'));
    }
}
