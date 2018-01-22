<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
           public $table = 'data_goods';
           public $primaryKey = 'goods_id';


           public $timestamps = false;
}
