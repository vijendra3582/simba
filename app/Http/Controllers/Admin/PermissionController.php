<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\AuthorizationController;

class PermissionController extends AuthorizationController
{
    public function __construct() 
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$this->checkPermission('view permission');
        $permissions = Permission::all();
        return view('admin.permission.index')->with(['permissions' => $permissions, 'title' => 'Manage Permissions']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$this->checkPermission('create permission');
        $roles = Role::get();
        return view('admin.permission.create')->with(['roles' => $roles, 'title' => 'Create Permission']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->checkPermission('create permission');
        $this->validate($request, [
            'name'=>'required|max:40',
        ]);

        $name = $request['name'];
        $permission = new Permission();
        $permission->name = $name;

        $roles = $request['roles'];
        
        $permission->save();

        if (!empty($request['roles'])) {
            foreach ($roles as $role) {
                $r = Role::where('id', '=', $role)->firstOrFail(); //Match input role to db record

                $permission = Permission::where('name', '=', $name)->first();   
                $r->givePermissionTo($permission);
            }
        }

        return redirect()->route('admin.permission')
            ->with('flash_message',
             'Permission '. $permission->name.' added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$this->checkPermission('view permission');
        return redirect('permissions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$this->checkPermission('edit permission');
        $permission = Permission::find($id);
        return view('admin.permission.edit', ['permission' => $permission, 'title' => 'Edit Permission : '.$permission->name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
		$this->checkPermission('edit permission');
		$id = $request->id;
        $permission = Permission::findOrFail($id);

        $this->validate($request, [
            'name'=>'required|max:40',
        ]);
        
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('admin.permission')
            ->with('flash_message',
             'Permission'. $permission->name.' updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$this->checkPermission('delete permission');
		
        $permission = Permission::findOrFail($id);
        
        if ($permission->name == "Administer roles & permissions") {
            return redirect()->route('admin.permission')
            ->with('flash_message',
             'Cannot delete this Permission!');
        }
        
        $permission->delete();

        return redirect()->route('admin.permission')
            ->with('flash_message',
             'Permission deleted!');
    }
}
