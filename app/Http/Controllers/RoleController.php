<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoles;
use App\Models\Permission;

/**
 * Class RoleController
 * @package App\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(10);

        return view('role.index', compact('roles'))
            ->with('i', (request()->input('page', 1) - 1) * $roles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        $permissions = Permission::all();

        return view('role.create', compact('role','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoles $request)
    {
        request()->validate(Role::$rules);

        $role = Role::create($request->all());

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index')
            ->with('success', 'Rol creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('role.show', compact('role','permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('role.edit', compact('role','permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Role $role
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRoles $request, Role $role)
    {
        request()->validate(Role::$rules);

        $role->update($request->all());

        $role->permissions()->sync($request->input('permissions'));

        return redirect()->route('roles.index')
            ->with('success', 'Rol actualizado satisfactoriamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rol eliminado satisfactoriamente');
    }

    public function assignPermissions(Request $request, Role $role)
{
    $request->validate([
        'permissions' => 'required|array',
    ]);

    $role->syncPermissions($request->permissions);

    return redirect()->route('roles.edit', $role)->with('success', 'Permisos asignados exitosamente');
}
}
