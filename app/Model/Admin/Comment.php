<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //让当前的模型跟表产生关联
    public $table = 'data_goods_comment';

    //定义关联表的主键
    public $primaryKey = 'id';

    public function good(){
        return $this->belongsTo('App\Model\Admin\Goods','goods_id','goods_id');
    }
}
