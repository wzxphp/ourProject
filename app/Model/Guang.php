<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guang extends Model
{
    public $table = 'data_rotation';
    public $primaryKey = "id";

    public $timestamps = false;
    public $guarded=[];
}
