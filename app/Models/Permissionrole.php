<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permissionrole extends Model
{
    protected $table ='permissionroles';
    static public function InsertUpdateRecord($permission_ids,$role){
        Permissionrole::where('role','=',$role)->delete();
      foreach($permission_ids as $permission_id){
         $save =new Permissionrole;
         $save->permissions_id =$permission_id;
         $save->role =$role;
         $save->save();
      }
    }
    static function getRolePermission($role){
        return Permissionrole::where('role', '=', $role)->get();
    }

    public static function getPermission($slug, $role)
    {
        return self::join('permissions', 'permissionroles.permissions_id', '=', 'permissions.id')
            ->where('permissionroles.role', $role)
            ->where('permissions.slug', $slug)
            ->count();
    }



}
