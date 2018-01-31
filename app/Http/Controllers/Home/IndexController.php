<?php

namespace App\Http\Controllers\Home;

use App\Model\Admin\Config;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Home\Recom;
use App\Model\Home\Comm;
use App\Model\Home\User;
use App\Model\Home\Cate;

class IndexController extends Controller
{
    //引入商城首页
    public function index()
    {
    	$recom = Recom::get();
    	$con1 = Config::find(1);
    	$con2 = Config::find(2);
    	$con3 = Config::find(3);

    	return view('Home/Index/index',compact('recom','catedata','con1','con2','con3'));
    }


}
