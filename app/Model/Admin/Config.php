<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $table = 'data_config';

    public $primaryKey = "conf_id";

//    public $fillable = ['']

    public $guarded = [];

    public $timestamps = false;
}
