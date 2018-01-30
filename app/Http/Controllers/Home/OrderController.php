<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Order;
use App\Model\Home\Cart;
use App\Model\Home\Addr;
use App\Model\Home\Comm;


class OrderController extends Controller
{
    //确认订单
	public function reorder(Request $request)
	{	//接收购物信息
		$req = $request->except('_token');

		// 更新购物车
		if($req)
		{
			Cart::where('id',$req['id'])->update($req);
		}
		//获取购物车和地址信息
		$orders = Cart::get();
		$data = Addr::get();
        // dd($data);
		// 遍历地址表和购物车表，获取订单信息数组
		$reorders = [];
		foreach($orders as $k=>$v)
		{
			$reorders['guid'] = 'mmdd'.time().mt_rand(10000,99999);
			$reorders['user_id'] = Session('home_user')->user_id;
			$reorders['cargo_message_id'] = $v->goods_id;
			$reorders['cargo_message_price'] = $v->goods_price;
			$reorders['cargo_message_number'] = $v->shopping_number;
			$reorders['total_amount'] = $v->goods_total;
			$reorders['cargo_message_name'] = $v->goods_name;
			$reorders['cargo_message_original'] = $v->goods_original;
			$reorders['status'] = 1;
		}

		foreach($data as $k=>$v)
		{
            $reorders['name'] = $v->name;
			$reorders['cargo_message_tel'] = $v->tel;
			$reorders['cargo_message_address'] = $v->address;
			$reorders['cargo_details_address'] = $v->detail_address;
		}
        // dd($reorders);
		// 返回页面
		return view('Home/order/reorder',compact('reorders','data'));

	}
// 提交订单页面
    public function index(Request $request)
    {    
    	//获取确认订单信息
    	$orderdata = $request -> except('_token');
// dd($orderdata);
        // 判断订单商品是否重复，如果重复，则不执行添加
        $res = Order::where('cargo_message_id',$orderdata['cargo_message_id'])->get()->ToArray();
        
        if(!empty($res))
        {
            return redirect('home/center/order');
        }else{
            // 将用户订单信息加入订单表
            Order::insert($orderdata);            
        }

		// 查询订单表信息
		$findorders = Order::where('user_id',Session('home_user')->user_id)->get();

    	// 加入订单后清空购物车表
    	foreach($findorders as $k=>$v)
    	{
    		$delcart = Cart::where('goods_id',$v->cargo_message_id)->delete();
    	}

    	// 将订单表信息返回到页面
    	return view('Home/order/order',compact('findorders'));
    }
// 浏览订单
    public function show()
    {
    	// 查询订单表信息
		$findorders = Order::where('user_id',Session('home_user')->user_id)->get()->ToArray();

    	return view('Home/order/order',compact('findorders'));
    }
// 订单详情
    public function orderinfo($id)
    {
        $info = Order::where('id',$id)->get();
        
        $rev = [];
        foreach($info as $k=>$v)
        {
            $rev['goods_id'] = $v->cargo_message_id;
        }
        $review = Comm::where('goods_id',$rev['goods_id'])->get();
// dd($review);
        return view('Home/order/orderinfo',compact('info','review'));
    }

// 取消订单
    public function remove($id)
    {
        $remove = Order::where('id',$id)->get();
        $removedata = [];
        foreach($remove as $k=>$v)
        {
            $removedata['status'] = 0;
        }

        // dd($removedata);
        $res = Order::where('id',$id)->update($removedata);
        if($res)
        {
            return redirect('home/center/order');
        }
        
    }
// 删除订单
    public function del($id)
    {
    	$res = Order::where('id',$id)->delete();
    	if($res)
    	{
    		return redirect('home/center/order')->with(['info'=>'订单删除成功']);
    	}else{
    		return back()->with(['info'=>'订单删除失败']);
    	}
    }
// 提醒收货(应该在后台操作状态，前台向后台发消息)
    public function remind($id)
    {
    	$redata = Order::where('id',$id)->get();
    	$remind = [];
    	foreach ($redata as $k => $v)
    	{
    		$remind['status'] = 2;
    	}
    	// dd($remind);
    	$res = Order::where('id',$id)->update($remind);
        if($res)
        {
            return redirect('home/center/order');
        }
    	
    }
// 确认收货
    public function confirm($id)
    {
    	$condata = Order::where('id',$id)->get();

    	$confirm = [];
    	foreach($condata as $k=>$v)
    	{
    		$confirm['status'] = 3;
    	}
    	// dd($confirm);
    	$res = Order::where('id',$id)->update($confirm);
    	return redirect('home/center/order');

    }



}
