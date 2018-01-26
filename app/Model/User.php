<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //让当前的user模型跟blog_user表产生关联
    public $table = 'data_admin_users';

    public $primaryKey = "id";





    //查找当前用户的角色  多对多
    public function roles()
    {
        return $this->belongsToMany('App\Model\Admin\Role','data_adminuser_role','admin_user_id','role_id');
    }
}
