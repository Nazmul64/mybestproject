<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table ='permissions';

    static public function getSingle($id){
        return Role::find($id);
    }
    public static function getRecord() {
        $getPermission = Permission::groupBy('groupby')->get();
        $result = array();

        foreach ($getPermission as $value) {
            $getPermissionGroup = Permission::getPermissionGroup($value->groupby);
            $data = array();
            $data['id'] = $value->id;
            $data['name'] = $value->name;

            $group = array();
            foreach ($getPermissionGroup as $valueG) {
                $dataG = array();
                $dataG['id'] = $valueG->id;
                $dataG['name'] = $valueG->name;
                $group[] = $dataG;
            }

            $data['group'] = $group;
            $result[] = $data;
        }

        return $result;
    }

    public static function getPermissionGroup($groupby) {
        return Permission::where('groupby', '=', $groupby)->get();
    }

}
