<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRolePermission;

/**
 * Class RolePermissionController
 * @package App\Http\Controllers
 */
class RolePermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolePermissions = RolePermission::paginate(10);

        return view('role-permission.index', compact('rolePermissions'))
            ->with('i', (request()->input('page', 1) - 1) * $rolePermissions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Roles = Role::all()->pluck('name', 'id')->toArray();
        $Permissions = Permission::all()->pluck('name', 'id')->toArray();
        $rolePermission = new RolePermission();
        return view('role-permission.create', compact('rolePermission','Roles','Permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePermission $request)
    {
        request()->validate(RolePermission::$rules);

        $rolePermission = RolePermission::create($request->all());

        return redirect()->route('role-permissions.index')
            ->with('success', 'RolePermission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rolePermission = RolePermission::find($id);

        return view('role-permission.show', compact('rolePermission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $Roles = Role::all()->pluck('name', 'id')->toArray();
        $Permissions = Permission::all()->pluck('name', 'id')->toArray();
        $rolePermission = RolePermission::find($id);

        return view('role-permission.edit', compact('rolePermission','Roles','Permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RolePermission $rolePermission
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRolePermission $request, RolePermission $rolePermission)
    {
        request()->validate(RolePermission::$rules);

        $rolePermission->update($request->all());

        return redirect()->route('role-permissions.index')
            ->with('success', 'RolePermission updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rolePermission = RolePermission::find($id)->delete();

        return redirect()->route('role-permissions.index')
            ->with('success', 'RolePermission deleted successfully');
    }
}
