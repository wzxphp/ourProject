<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Buser extends Model
{
    //让当前的user模型跟blog_user表产生关联
    public $table = 'data_user_message';

    //定义关联表的主键
    public $primaryKey = 'user_id';
}
