<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //引入商城首页
    public function index()
    {
        $res = DB::table('data_recommend')->get();
    	return view('Home/Index/index',compact('res'));

    	// $recommend = 推荐位表::get();
//    	return view('Home/Index/index',compact('recommend'));
    }


}
