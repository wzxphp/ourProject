<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //让当前的user模型跟blog_user表产生关联
    public $table = 'data_admin_users';

}
