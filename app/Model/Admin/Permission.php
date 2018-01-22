<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public $table = 'data_permission';

    public $primaryKey = "id";


    public $guarded = [];

    public $timestamps = false;
}
