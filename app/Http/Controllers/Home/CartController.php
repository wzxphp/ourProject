<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Good;
use App\Model\Home\Cart;
use Session;

class CartController extends Controller
{
    //
    public function cart(Request $request,$id)
    {  //判断用户购买商品时是否登录
    	if( empty(Session('home_user')))
    	{
    		return redirect('home/login/index');
    	}
    	// 获取要购买的商品数量
    	$data = $request -> except('_token');

    	// 查询要购买的商品信息
    	$cart = Good::where('goods_id',$id)->get();
    	// 将用户要购买的商品加入购物车
    	$cartdata = [];
    	foreach($cart as $k=>$v)
    	{
    		$cartdata['user_id'] = Session('home_user')->user_id;
    		$cartdata['goods_id'] = $v->goods_id;
    		$cartdata['goods_name'] = $v->goods_name;
    		$cartdata['goods_original'] = $v->goods_original;
    		$cartdata['shopping_number'] = $data['shopping_number'];
    		$cartdata['goods_price'] = $v->goods_price;
    		$cartdata['goods_total'] = $v->goods_price*$data['shopping_number'];
    	}

        // 如果购物车有此商品，则再加数量，如果没有此商品，则添加商品
        $res = Cart::where('goods_id',$cartdata['goods_id'])->get()->ToArray();

        if(empty($res))
        {
            Cart::insert($cartdata);
        }else{
            foreach ($res as $m => $n) {
                if($n['goods_id']==$cartdata['goods_id'])
                {
                    $cartdata['shopping_number'] += $n['shopping_number'];
                    Cart::where('goods_id',$id)->update($cartdata);
                }
            }
        }

    	// 从购物车中查询选好的商品
    	$findcart = Cart::get();
    	// 将商品返还到购物车页面
    	return view('Home.cart.cart',compact('findcart'));
    }

    public function index()
    {   
        if(empty(Session('home_user')))
        {
            return redirect('home/login/index')->with(['info'=>'请登录']);
        }
        //查询购物车中的商品
    	$findcart = Cart::get();
    	// 将购物车中的商品返还到购物车页面
    	return view('Home.cart.cart',compact('findcart'));
    }

    public function del($id)
    {   //删除购物车指定商品
    	$res = Cart::destroy($id);
        // 判断删除是否成功
    	if($res)
    	{
    		return redirect('home/cart')->with(['info'=>'删除成功']);
    	}else{
    		return back()->with(['info'=>'删除失败']);
    	}


    }
}
