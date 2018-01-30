<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Guang extends Model
{
    public $table = 'data_rotation';
    public $primaryKey = "id";
    public $guarded=[];
    public $timestamps = false;
}
