<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home\Cate;
use App\Model\Home\Good;

class CateController extends Controller
{
    //
    public function cate()
    {
    	$goodsdata = Good::paginate(2);
    	
    	return view('Home/List/cate',compact('goodsdata'));
    }
}
