<?php

namespace App\Model\Home;

use Illuminate\Database\Eloquent\Model;

class Good extends Model
{
    //
    public $table = 'data_goods';

    public $primarykey = 'goods_id';

    // public function comments()
    // {
    //   return $this->belongsToMany('App\Model\Home\Comm','rel_goods_comment','goods_id','comment_id');
    // }
}
