<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Home\Recom;
use App\Model\Home\Comm;
use App\Model\Home\User;

class IndexController extends Controller
{
    //引入商城首页
    public function index()
    {
    	$recom = Recom::get();

    	return view('Home/Index/index',compact('recom'));
    }

    public function recom($id)
    {
    	$recoms = Recom::where('id',$id)->get();
    	dd($recoms);

    	// 商品的评论
        // $review = Comm::where('goods_id',$id)->get();
     //    dd($review);
     //    $user = [];
     //    foreach($review as $k=>$v)
     //    {
     //        $user['user_id'] = $v->user_id;
     //    }

     //    $revuser = User::where('user_id',$user['user_id'])->get();

    	// return view('Home/details/recom',compact('recoms','revuser','review'));

    }


}
