<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleInsertFormRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return DataTables::of(Role::query())->make(true);
        return view('backend.roles.index');
    }

    public function pull()
    {
//        $roles = Role::query()->orderBy('id', 'asc')->where('id','1');
        $roles = Role::query()->withTrashed();
        return DataTables::of($roles)
            ->addColumn('action', function ($roles) {
                return '<a href= "' . $roles->id . '/show" class="btn btn-primary btn-sm text-white role">View</a>';
            })
            ->addColumn('state', function ($roles) {
                if ($roles->deleted_at != null)
                    return '<span class="fa fa-ban" style="font-size:20px;color:red;">';
                else
                    return '<span class="fa fa-check-circle" style="font-size:20px;color:green;">';
            })
            ->rawColumns(['state', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleInsertFormRequest $request)
    {
        $role = new Role();
        $role->name = $request->get('name');
        $role->description = $request->get('description');
        $role->save();
        return redirect('backend/roles/index')->with('status', 'Successfully Inserted Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::withTrashed()->find($id);
        return view('backend/roles/show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::withTrashed()->find($id);
        $permissions = Permission::all();
        $selectedPermissions = $role->permissions()->pluck('id')->toArray();
        return view('/backend/roles/edit', compact('role', 'permissions', 'selectedPermissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoleInsertFormRequest $request, $id)
    {
        $role = Role::withTrashed()->find($id);
        $role->name = $request->get('name');
        $role->description = $request->get('description');
        $role->syncPermissions($request->get('permission'));
        if ($role->update()) {
            return redirect('backend/roles/index')->with('status', 'Successfully updated Data!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        $role->ForceDelete();
        return redirect('/backend/roles/index')->with('status', 'Successfully Deleted Data!');
    }

    public function soft($id)
    {
        $role = Role::find($id);
        $role->Delete();
        return redirect('/backend/roles/index')->with('status', 'Successfully Disable Data!');
    }

    public function restore($id)
    {
        $role = Role::withTrashed()->find($id);
        $role->restore();
        return redirect('/backend/roles/index')->with('status', 'Successfully Enable Data!');

    }
}
