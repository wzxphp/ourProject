<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home\Good;
use App\Model\Home\Comm;
use App\Model\Home\User;


class ListController extends Controller
{
    //商品列表页
    public function list()
    {
        $listdata = Good::paginate(2);
        // dd($listdata);
    	return view('Home/List/list',compact('listdata'));
    }
// 休闲家居
    public function casual()
    {
        $casual = Good::paginate(2);
        // dd($casual);
    	return view('Home/List/casual',compact('casual'));
    }
// 数码
    public function digital()
    {
        $digital = Good::paginate(2);
    	return view('Home/List/digital',compact('digital'));
    }
// 户外
    public function outdoor()
    {
        $outdoor = Good::paginate(2);
    	return view('Home/List/outdoor',compact('outdoor'));
    }
// 商品详情
    public function details($id)
    {
        $data = Good::where('goods_id',$id)->get();

        $review = Comm::where('goods_id',$id)->get();

        $user = [];
        foreach($review as $k=>$v)
        {
            $user['user_id'] = $v->user_id;
        }

        $revuser = User::where('user_id',$user['user_id'])->get();
        
    	return view('Home/details/details',compact('data','review','revuser'));
    }
}
