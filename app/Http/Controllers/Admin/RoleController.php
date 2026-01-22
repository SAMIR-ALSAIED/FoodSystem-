<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Role\AddRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

public function index(){


$roles=Role::all();

return view('dashbord.roles.index',compact('roles'));

}

public function create(){

$permissions=Permission::all();

return view('dashbord.roles.create',compact('permissions'));

}

public function store(AddRoleRequest $request){

   $data = $request->validated();

$role = Role::create(['name' => $request->name]);

 $permissions = Permission::find($request->permissions);
    $role->syncPermissions( $permissions);

    return redirect()->route('roles.index')->with('success', 'تم إنشاء الدور بنجاح!');


}

}

