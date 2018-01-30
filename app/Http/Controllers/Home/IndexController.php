<?php

namespace App\Http\Controllers\Home;

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

    	return view('Home/Index/index',compact('recom','catedata'));
    }


}
