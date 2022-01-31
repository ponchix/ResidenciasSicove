<?php

namespace App\Http\Controllers;

use App\Models\TypeFuel;
use Illuminate\Http\Request;

/**
 * Class TypeFuelController
 * @package App\Http\Controllers
 */
class TypeFuelController extends Controller
{

    public function __construct()  
    {
        $this->middleware('permission:Ver tipos combustible |Agregar tipos combustible|Editar tipos combustible|Borrar tipo combustible', ['only' => ['index']]);
        $this->middleware('permission:Agregar tipos combustible', ['only' => ['create', 'store']]);
        $this->middleware('permission:Editar tipos combustible', ['only' => ['edit', 'update']]);
        $this->middleware('permission:Borrar tipos combustible', ['only' => ['destroy']]);
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
        $tipos = TypeFuel::all();

        return view('type-fuel.index', compact('tipos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeFuel = new TypeFuel();
        return view('type-fuel.create', compact('typeFuel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypeFuel::$rules);

        $typeFuel = TypeFuel::create($request->all());

        return redirect()->route('tipos-combustibles.index')
            ->with('add', 'agregar');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typeFuel = TypeFuel::find($id);

        return view('type-fuel.show', compact('typeFuel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeFuel = TypeFuel::find($id);

        return view('type-fuel.edit', compact('typeFuel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypeFuel $typeFuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypeFuel $typeFuel)
    {
        request()->validate(TypeFuel::$rules);

        $typeFuel->update($request->all());

        return redirect()->route('type-fuels.index')
            ->with('success', 'TypeFuel updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typeFuel = TypeFuel::find($id)->delete();

        return redirect()->route('type-fuels.index')
            ->with('success', 'TypeFuel deleted successfully');
    }
}
