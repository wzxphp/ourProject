<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //引入商城首页
    public function index()
    {
    	//
    	// $recommend = 推荐位表::get();
    	return view('Home/Index/index',compact('recommend'));
    }


}
