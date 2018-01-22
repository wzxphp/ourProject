<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;

class OrderController extends Controller
{
    //订单列表
    public function index()
    {
        $cates = Order::get();
//        dd($cates);

        return view('admin.order.list',compact('cates'));
    }

    //修改订单列表
    public function edit($id)
    {
//        return 1111;
        //1 通过传过来的id获取到要修改的用户记录
        $cate = Order::find($id);
//        dd($cate);

        return view('admin.Order.edit',['cate'=>$cate]);

    }
    public function update(Request $request)
    {
        $input = $request->only('id', 'name', 'describe');
//        return 1111;
//        dd($input);
//        使用模型修改表记录的两种方法,方法一
        $cate = $request->only('id');
//        dd($cate);
//        $user->user_name = $input['user_name'];

//        $res = $user->save();

////        方法二
        $res = Cate::where('id', $cate)->update($input);
//
        if ($res) {

//          return 111;
            return redirect('admin/order/list')->with('msg','修改成功');;
//            return redirect('admin/cate')->with('msg','添加成功');
        } else {
            //如果添加失败，返回到修改页
            return back()->with('msg', '修改失败');

        }
    }

}
