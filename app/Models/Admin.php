<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;

    protected $table="admins";

    protected $fillable = [
        'name','email','password'
    ];

    protected $hidden = [
        'password',
    ];


    public static function getPermissionGroups()
    {
        $permission_groups = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_groups;
    }

    public static function getPermissionGroupName($group_name)
    {
        $allpermissions = DB::table('permissions')->select('name', 'id')->where('group_name', $group_name)->get();
        return $allpermissions;
    }

    public static function roleHasPermissions($role, $permissions)
    {
        $hasPermission = true;

        foreach ($permissions as $permission) {

            // echo '<pre>';
            // print_r($permission);
            // echo '</pre>';

            if (!$role->hasPermissionTo($permission->id)) {
                $hasPermission = false;
            }

            return $hasPermission;
        }


    }
}
