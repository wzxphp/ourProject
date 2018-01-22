<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'data_orders';
    public $primaryKey = "id";
    public $guarded=[];
    public $timestamps = false;

}
