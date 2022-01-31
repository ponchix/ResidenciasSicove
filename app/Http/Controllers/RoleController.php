<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Add
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function __construct()  {
        $this->middleware('permission:ver-role | crear-role|editar-role|borrar-role',['only'=>['index']]);
        $this->middleware('permission:crear-role',['only'=>['create','store']]);
        $this->middleware('permission:editar-role',['only'=>['edit','update']]);
        $this->middleware('permission:borrar-role',['only'=>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles=Role::paginate(5);
        return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permission = Permission::where('id','<','20')->get();
        $permission2 = Permission::where('id','>','19')->where('id','<','39')->get();
        $permission3 = Permission::where('id','>','38')->where('id','<','58')->get();
        $permission4 = Permission::where('id','>','57')->where('id','<','76')->get();

        // $permission = Permission::get()->take(5);

        return view('roles.crear',compact(
            'permission',
            'permission2',
            'permission3',
            'permission4'
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
        $this->validate($request,['name'=>'required', 'permission'=>'required']);
        $role=Role::create(['name'=>$request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index');
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
        $role=Role::find($id);
        $permission = Permission::where('id','<','23')->get();
        $permission2 = Permission::where('id','>','22')->where('id','<','45')->get();
        $permission3 = Permission::where('id','>','44')->where('id','<','67')->get();
        $rolePermissions=DB::table('role_has_permissions')->where('role_has_permissions.role_id',$id)->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')->all();
        return view('roles.editar',compact(
            'role',
            'permission',
            'permission2',
            'permission3',
            'rolePermissions'));
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
        $this->validate($request,['name'=>'required', 'permission'=>'required']);
        $role=Role::find($id);
        $role->name=$request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');

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

        DB::table('roles')->where('id',$id)->delete();
         return redirect()->route('roles.index')->with('mensaje', 'ok');
    }
}
