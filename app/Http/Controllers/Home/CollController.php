<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Good;
use App\Model\Home\Coll;

class CollController extends Controller
{
	public function index()
	{
		$colldata = Coll::get();
		// dd($colldata);
		return view('Home/user/coll',compact('colldata'));
	}
    public function coll($id)
    {
    	$data = Good::where('goods_id',$id)->get()->ToArray();
    	// dd($data);
    	$res = Coll::insert($data);
    	// dd($res);
    	if($res)
    	{
    		return redirect('home/coll')->with(['info'=>'收藏成功']);
    	}else{
    		return back()->with(['info'=>'收藏失败']);
    	}

    }

    public function del($id)
    {
    	$res = Coll::where('id',$id)->delete();
    	if($res)
    	{
    		return redirect('home/coll')->with(['info'=>'收藏已取消']);
    	}else{
    		return back()->with(['info'=>'收藏取消失败']);
    	}
    }
}
