<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //引入商城首页
    public function index()
    {
    	// return '123';
    	return view('Home/Index/index');
    }


}
