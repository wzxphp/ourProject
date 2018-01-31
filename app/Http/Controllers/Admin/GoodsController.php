<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Goods;
use App\Model\Cate;
class GoodsController extends Controller
{
    // 查询商品
    public function index(Request $request)
    {
//        // 1,获取所有数据
//        $category = (new Cate)->getCate();
//        $ls = DB::table('data_goods')->leftJoin('data_category','data_goods.category_id','=','data_category.id')->orderBy('data_goods.goods_id','asc')->get();
//      $cate =  Cate::get(['name','id']);
        $cate = (new Cate)->getCate();
        $cates = array_column($cate,'name','id');
        $goods = DB::table('data_goods')
                ->where(function($query) use($request){
                //检测关键字
                $goods_name = $request->input('goods_name');    // 名称
                $goods_price = $request->input('goods_price');    // 价格
                //如果用户名不为空
                if(!empty($goods_name)) {
                    $query->where('goods_name','like','%'.$goods_name.'%');
                }
                //如果价格不为空
                if(!empty($goods_price)) {
                    $query->where('goods_price','like','%'.$goods_price.'%');
                }
                })->Simplepaginate(5);


        return view('admin.admin_goods.index',['goods'=>$goods,'cates'=>$cates]);

    }

    // 添加商品页
    public function create()
    {

        $category = (new Cate)->getCate();

        return view('admin.admin_goods.create',['category'=>$category]);
    }

    // 添加商品
    public function upload(Request $request)
    {
        // 获取传过来的参数
        $data = $request->except('_token');
        // if(!$data['pid'] == "0"){
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
               $data['category_id'] = $data['id'];
               unset($data['id']);
               if($data['category_id']){
                   $res = DB::table('data_goods')->insert($data);
                   if ($res)
                   {
                       // $goodsinfo = DB::table('data_goodsinfo')->insert($data);
                       return redirect('admin/goods/index');
                   } else {
                       return back('admin/goods/edit')->with('error','添加失败');
                   }
               } else {
                   return back('admin/goods/create')->with('error','请添加分类');
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

    // 上架下架状态
    public function goods_sta(Request $request)
    {
      $id = $request -> close;
      $goods = Goods::find($id);
      if($goods -> goods_status == '1'){
            $goods -> goods_status = '2';
        }else if($goods -> goods_status == '2'){
            $goods -> goods_status = '1';
        }
        $res = $goods -> save();
        //如果修改成功
        if($res){
            $data = ['goods_status'=>1, 'message'=>'修改状态成功'];

        }else{
            $data = ['goods_status'=>2, 'message'=>'修改状态失败'];
        }
        return $data;
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