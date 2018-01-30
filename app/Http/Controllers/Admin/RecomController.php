<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Admin\Goods;
use App\Model\recommend;

class RecomController extends Controller
{
    //推荐位
    public function index(Request $request)
    {
//        $date = DB::table('data_recommend')->simplePaginate(2);
        $date = DB::table('data_recommend')
            ->where(function($query) use($request){
                //检测关键字
                $recommend_name = $request->input('recommend_name');    // 名称
                //如果用户名不为空
                if(!empty($recommend_name)) {
                    $query->where('recommend_name','like','%'.$recommend_name.'%');
                }
            })->simplePaginate(5);


        return view('admin.admin_remo.add',['date'=>$date]);
    }

    // 添加推荐位
    public function add()
    {
       return view('admin.admin_remo.creat');
    }

    // 添加商品
    public function upadd(Request $request)
    {
        $data = $request->except('_token');
//        return dd($data);
        if($request->file('recommend_img')){
//            获取上传图片文件
            $file = $request->file('recommend_img');
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
                $data['recommend_img'] = $url;
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['updated_at'] = date('Y-m-d H:i:s');
                $res = DB::table('data_recommend')->insert($data);

                    if ($res)
                    {
                        return redirect('admin/recom/index');
                    } else {
                        return back('admin/recom/add')->with('error','添加失败');
                    }

            }
        }
    }

    public function edit($id)
    {
        $data = recommend::find($id);
        return view('admin.admin_remo.edit',compact('data'));
    }

    public function doedit(Request $request,$id)
    {
        if($request->file('recommend_img')){
//            获取上传图片文件
            $file = $request->file('recommend_img');
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
                $data = recommend::find($id);
                $data->recommend_img = $url;
                $data->recommend_name = $input['recommend_name'];
                $data->recommend_invent = $input['recommend_invent'];
                $data->recommend_info = $input['recommend_info'];
                $data->recommend_discount = $input['recommend_discount'];
                $res = $data->save();
                if($res)
                {
                    return redirect('admin/recom/index');
                }
            }
        }
    }

    public function dels($id)
    {

        //删除一行
        $res = recommend::find($id)->delete();
        //如果删除成功
        if($res){
            $data = ['status'=>0, 'message'=>'1删除成功'];
        }else{
            $data = ['status'=>1, 'message'=>'1删除失败'];
        }

        return $data;

    }
}