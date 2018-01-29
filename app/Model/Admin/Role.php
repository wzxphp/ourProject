<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = 'data_role';

    public $primaryKey = "id";


    public $guarded = [];

    public $timestamps = false;


    //查找当前角色的权限  多对多
    public function permission()
    {
        return $this->belongsToMany('App\Model\Admin\Permission','data_role_permission','role_id','permission_id');
    }
}
