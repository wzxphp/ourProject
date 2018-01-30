<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class recommend extends Model
{
    //推荐位 模版
    public $table = 'data_recommend';
    public $primaryKey = 'id';
    public $timestamps = false;
}
