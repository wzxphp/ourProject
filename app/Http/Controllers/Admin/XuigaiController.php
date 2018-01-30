<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Goods;
use App\Model\recommend;
class XuigaiController extends Controller
{
	// // 浏览
	public function create(Request $request)
    {
    	
    	$data = DB::table('data_recommend')
                ->where(function($query) use($request){
                //检测关键字
                $recommend_name = $request->input('recommend_name');    // 名称
                //如果用户名不为空
                if(!empty($recommend_name)) {
                    $query->where('recommend_name','like','%'.$recommend_name.'%');
                }
                })->Simplepaginate(5);
    	return view('admin.admin_remo.add',['data'=>$data]);
    }


	// public function 

    // 添加
    public function index(Request $request,$id)
    {	

    	$goods = Goods::find($id);
    	
    	$recommend['goods_id'] = $id;
    	$recommend['recommend_name'] = $goods['goods_name'];
    	$recommend['recommend_invent'] = $goods['inventory'];
    	$recommend['recommend_volume'] = $goods['sales_volume'];
    	$recommend['recommend_info'] = $goods['goods_info'];
    	$recommend['recommend_img'] = $goods['goods_original'];
    	$recommend['recommend_discount'] = $goods['goods_discount'];
    	$recommend['recommend_price'] = $goods['goods_price'];
    	$recommend['created_at'] = $goods['create_at'];
    	$recommend['updated_at'] = $goods['update_at'];
    	$data = recommend::insert($recommend);
    	
    	if($data)
    	{
    		return redirect('admin/goods/index')->with('msg','保存成功');
    	}else{
    		return back()->with('msg','修改失败');
    	}
    }

    // 删除信息
     public function del($id)
    {
        $res = recommend::find($id)->delete();
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
