<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RotaController extends Controller
{
    public function index()
    {
    	// $data = Rotation::get();
    	// dd($data);
    	return view('/home/style.css');
    }
}
