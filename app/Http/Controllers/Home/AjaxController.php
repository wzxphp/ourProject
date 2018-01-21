<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home\Pro;

class AjaxController extends Controller
{
    //获取地址信息
    public function ajax(Request $request)
    {
    	$prodata = $request ->input('val');
    	dd($prodata);
    }
}
