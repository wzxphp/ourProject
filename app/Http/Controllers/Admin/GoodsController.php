<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Goods;
class GoodsController extends Controller
{
    // 查询商品
    public function index(Request $request)
    {
        // 1,获取所有数据
      $ls = DB::table('data_goods')->get();
          $goods = DB::table('data_goods')->paginate(5);
          return view('admin.admin_goods.index',['goods'=>$goods,'ls'=>$ls]);

    }

    // 添加商品页
    public function create()
    {
        return view('admin.admin_goods.create');
    }

    // 接收保存商品
    public function upload(Request $request)
    {

        // 获取传过来的参数
        $data = $request->except('_token');

            // 请求中是否携带上传图片
       if($request->file('goods_original')){
//            获取上传图片文件
           $file = $request->file('goods_original');
            // 判断上传文件的有效性
           if($file->isValid()) {
               $entension = $file->getClientOriginalExtension();//上传文件的后缀名
               // 生成新的文件名
               $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
               // 将文件移动到指定位置
               $path = $file->move(public_path().'/uploads',$newName);
               // 返回上传文件图片  显示到浏览器上面
               $url ='/uploads/'.$newName;
               // 把所保存的图片位置放入到字段中去
               $data['goods_original'] = $url;
               $data['create_at'] = date('Y-m-d H:i:s');
               $res = DB::table('data_goods')->insert($data);
               if ($res)
               {
                   return redirect('admin/goods/index');
               } else {
                   return back('admin/goods/edit')->with('error','添加失败');
               }
            }
        }

    }

    // 修改
    public function edit($id)
    {
        //1 通过传过来的id获取到要修改的用户记录
        $goods = Goods::find($id);
        return view('admin.admin_goods.edit',compact('goods'));
    }

    // 修改商品
    public function xxoo(Request $request,$id)
    {
      if($request->file('goods_original')){
//            获取上传图片文件
           $file = $request->file('goods_original');
            // 判断上传文件的有效性
           if($file->isValid()) {
               $entension = $file->getClientOriginalExtension();//上传文件的后缀名
               // 生成新的文件名
               $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
               // 将文件移动到指定位置
               $path = $file->move(public_path().'/uploads',$newName);
               // 返回上传文件图片  显示到浏览器上面
               $url ='/uploads/'.$newName;
               // 把所保存的图片位置放入到字段中去
                
               
        $input = $request->except('_token');
        $goods = Goods::find($id);
        $goods->goods_original = $url;
        $goods->goods_name = $input['goods_name'];
        $goods->goods_price = $input['goods_price'];
        $goods->goods_discount = $input['goods_discount'];
        $goods->inventory = $input['inventory'];
        $goods->goods_info = $input['goods_info'];
        $data = $goods->save();
        if($data)
        { 
            
            return redirect('admin/goods/index');
        }
            }
        }
        
    }



    // 删除信息
    public function del($id)
    {
        $res = Goods::find($id)->delete();
        if ($res) {
            $data = [
                'status' => 0,
                'message' => '删除成功'
            ];
        } else {
            $data = [
                'status' => 1,
                'message' => '删除失败'
            ];
        }
        return $data;
    }



}