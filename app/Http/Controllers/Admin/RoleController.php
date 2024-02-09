<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function allPermission()
    {
        $permissions = Permission::all();
        return view('admin.role_permission.permission.all_permission', compact('permissions'));
    }

    public function addPermission()
    {
        return view('admin.role_permission.permission.add_permission');
    }

    public function storePermission(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'name' => 'required|string|max:200',
            'group_name' => 'required|string|max:200',
        ]);


        $permission = Permission::create([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);

        return redirect()->route('admin.permission.allPermission')->with('success', "Permission added successfully");
    }

    public function editPermission($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.role_permission.permission.edit_permission', compact('permission'));
    }

    public function updatePermission(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'id' => 'nullable|numeric|exists:permissions,id',
            'name' => 'required|string|max:200',
            'group_name' => 'required|string|max:200',
        ]);

        $permission = Permission::findOrFail($request->id)->update([
            'name' => $request->name,
            'group_name' => $request->group_name,
        ]);
        return redirect()->route('admin.permission.allPermission')->with('success', "Permission Updated successfully");
    }

    public function deletePermission(Request $request)
    {
        try {
            $data = Permission::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Delete Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }





    //Role Function Start

    public function allRole()
    {
        $roles = Role::all();
        return view('admin.role_permission.role.all_role', compact('roles'));
    }

    public function addRole()
    {
        return view('admin.role_permission.role.add_role');
    }

    public function storeRole(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:200',
        ]);


        $role = Role::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.role.allRole')->with('success', "Role added successfully");
    }

    public function editRole($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.role_permission.role.edit_role', compact('role'));
    }

    public function updateRole(Request $request)
    {

        $this->validate($request, [
            'id' => 'nullable|numeric|exists:roles,id',
            'name' => 'required|string|max:200',
        ]);

        $role = Role::findOrFail($request->id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.role.allRole')->with('success', "Role Updated successfully");
    }

    public function deleteRole(Request $request)
    {
        try {
            $data = Role::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Delete Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    //Role Function End




    // Role add Permission Start

    public function allRolePermission()
    {
        $roles = Role::all();
        return view('admin.role_permission.roleSetup.all_roles_permission', compact('roles'));
    }

    public function addRolePermission()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = Admin::getPermissionGroups();
        // dd($permission_groups);

        return view('admin.role_permission.roleSetup.add_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function storeRolePermission(Request $request)
    {

        $data = array();

        foreach ($request->permission_id as $key => $permission_id) {
            $data['role_id'] = $request->role_id;
            $data['permission_id'] = $permission_id;

            DB::table('role_has_permissions')->insert($data);
        }

        return redirect()->back()->with('success', "Add successfully");
    }

    public function editRolePermission($id)
    {
        $roles = Role::findOrFail($id);
        // dd($roles);
        $permissions = Permission::all();
        $permission_groups = Admin::getPermissionGroups();
        // dd($permission_groups);

        return view('admin.role_permission.roleSetup.edit_roles_permission', compact('roles', 'permissions', 'permission_groups'));
    }

    public function updateRolePermission(Request $request, $id)
    {


        $role = Role::findOrFail($id);
        $permissions = $request->permission_id;

        // dd($permissions,$role);

        $cleanedPermissions = [];

        foreach ($permissions as $permission) {
            $cleanedValue = trim($permission, '"');
            $intValue = intval($cleanedValue);

            if (!empty($intValue)) {
                $cleanedPermissions[] = $intValue;
            }
        }

        // If you want to sync permissions with a role
        $role->syncPermissions($cleanedPermissions);

        return redirect()->back()->with('success', "Updated successfully");
    }

    public function deleteRolePermission(Request $request)
    {
        try {
            $data = Role::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Delete Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    // Role add Permission End


    //Create Admin Start

    public function list()
    {
        $data = Admin::latest()->get();
        return view('admin.role_permission.create_admin.list', compact('data'));
    }

    public function form($id = null)
    {
        $roles = Role::all();
        if ($id) {
            $data = Admin::findOrFail($id);
            // dd($data);
            return view('admin.role_permission.create_admin.form', compact('data', 'roles'));
        } else {
            return view('admin.role_permission.create_admin.form', compact('roles'));
        }
    }

    public function submit(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'id' => 'nullable|numeric|exists:admins,id',
            'name' => 'required|string|max:200',
            'email' => 'required|email|max:200',
            // 'password' => 'required_if:id,null|string|max:200',
            'password' => 'required_if:id,!=,null|string|max:200',

        ], [
            'image.required_without' => 'The image field is required'
        ]);

        $id = $request->id;

        if ($id) {
            $blog = Admin::findOrFail($id);
            $msg = "Update Add Successfully !!";
        } else {
            $blog = new Admin();
            $msg = "Add Successfully !!";
            $blog->password = Hash::make($request->password);
        }

        $blog->name = $request->name;
        $blog->email = $request->email;


        $blog->roles()->detach();
        if ($request->roles) {

            $dd = $request->roles;

            $cleanedValue = trim($dd, '"');
            $intValue = intval($cleanedValue);

            // dd($intValue);
            $blog->assignRole($intValue);
        }
        $blog->save();
        return redirect()->back()->with('success', $msg);
    }

    public function status($id)
    {
        $data = Admin::findOrFail($id);
        $data->status = $data->status == 1 ? 2 : 1;
        $data->save();
        return back()->with('success', 'Status Update Successfully !!');
    }

    public function delete(Request $request)
    {
        try {
            $data = Admin::findOrFail($request->id);
            $data->delete();
            return response()->json(['success' => true, 'message' => 'Delete Successfully']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
}
