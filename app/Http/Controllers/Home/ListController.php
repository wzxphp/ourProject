<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListController extends Controller
{
    //商品列表页
    public function list()
    {
    	return view('Home/List/list');
    }

    public function casual()
    {
    	return view('Home/List/casual');
    }

    public function digital()
    {
    	return view('Home/List/digital');
    }

    public function outdoor()
    {
    	return view('Home/List/outdoor');
    }

    public function cate()
    {
    	return view('Home/List/cate');
    }

    public function details()
    {
    	return view('Home/details/details');
    }
}
