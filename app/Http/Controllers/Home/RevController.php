<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Comm;

class RevController extends Controller
{
    public function del($id)
    {
    	$res = Comm::where('id',$id)->delete();
    	if($res)
    	{
    		return back()->with(['info'=>'评论已撤销']);
    	}else{
    		return redirect('home/center/order')->with(['info'=>'评论撤销失败']);
    	}
    }
}
