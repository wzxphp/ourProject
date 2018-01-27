<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\Home\Good;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
    	$data = $request -> except('_token');

		$goodsdata = Good::where("goods_name","like","%".$data["keywords"]."%")->paginate(2);
		
		return view('Home.List.cate',compact('goodsdata'));

    }
}
