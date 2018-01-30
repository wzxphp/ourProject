<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;
use DB;

class OrderController extends Controller
{
    //订单列表
    public function index(Request $request)
    {
        $cates = Order::get();   //获取总共有多少管理员

        $data =  DB::table('data_orders')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('name');
                $mindate = $request->input('mindate');
                $maxdate = $request->input('maxdate');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('name','like','%'.$username.'%');
                }
                //如果日期不为空
                if(!empty($mindate)) {
                    $query->whereBetween('created_at',[$mindate,$maxdate]);
                }
            })->simplePaginate(6);
//        $cates = Order::get();

        return view('admin.order.list',compact('cates','data'));
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

        $input = $request->except('_token');
//        $input = $request->all();
//        $cate = Order::find($input['id']);
//        $input = $request->only('id','user_name','tel','cargo_message_address');
//        return 1111;
//        dd($input);


//        使用模型修改表记录的两种方法,方法一
        $cate = $request->only('id');
//        dd($cate);
//        $ user->user_name = $input['user_name'];

//        $res = $user->save();

////        方法二
        $res = Order::where('id', $cate)->update($input);
//
        if ($res) {
            return redirect('admin/order/index')->with('msg','修改成功');
        } else {
            //如果添加失败，返回到修改页
            return back()->with('msg', '修改失败');

        }
    }
    //订单状态

//    public function statu(Request $request)
//    {
//        $id = $request -> close;
//        $order =  Order::find($id);
//        if($order -> status == '0'){
//            $order -> status = '1';
//        }elseif($order -> status == '1'){
//            $order -> status = '0';
//        }
//        $res = $order -> save();
//        //如果修改成功
//        if($res){
//            $data = ['status'=>0, 'message'=>'修改状态成功'];
//        }else{
//            $data = ['status'=>1, 'message'=>'修改状态失败'];
//        }
//        return $data;
//    }
//    已发货
        public function up($id,$status=1)
        {
            order::where('id',$id)->update(['status'=>$status]);
            return redirect('/admin/order/index');

        }

    //代发货
    public function yes($id,$status=2)
    {
        order::where('id', $id)->update(['status' => $status]);
        return redirect('/admin/order/index');
    }
    //代发货
    public function dis($id,$status=3)
    {
        order::where('id', $id)->update(['status' => $status]);
        return redirect('/admin/order/index');
    }

        //代发货
        public function down($id,$status=0)
        {
            order::where('id', $id)->update(['status' => $status]);
            return redirect('/admin/order/index');
        }
    //代发货
    public function lun($id,$status=4)
    {
        order::where('id', $id)->update(['status' => $status]);
        return redirect('/admin/order/index');
    }



}
