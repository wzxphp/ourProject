<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Model\Guang;

class GuangController extends Controller
{
    public function index()
    {
        $data = \DB::table('data_rotation')->OrderBy('sort', 'asc')->get();
        return view('admin.guang.list', ['data' => $data]);
//
    }
    public function add()
    {


//        $cates = Cate::all();
//        dd($cates);

//        实例化分类对象
//return 1111;
//        $cate = new Cate();
//        $cates = $cate->getCate();
//        $cates = Cate::all();
//        $cates = DB::table('data_rotation')->get();

//        $cates = DB::table('data_category')->get();
//        dd($cates);


        return view('admin.guang.add');
    }
    public function insert(Request $request)

    {

//        return 1111;

//         $all = $request->all();
//        dd($all);
        $data = $request->except('_token', 'token');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            if ($file->isValid()) {
                //处理//获取图片扩展名
                $ext = $file->getClientOriginalExtension();

                // dd($ext);}
                $filename = time() . mt_rand(1000, 99999) . '.' . $ext;
                $res = $file->move('./uploads', $filename);
                if ($res) {
                    $data['img'] = $filename;
                } else {
                    $data['img'] = 'default.jpg';
                }
            } else {
                $data['img'] = 'default.jpg';
            }
        } else {
            $data['img'] = 'default.jpg';
        }
        //处理状态
        $data['status'] = 0;

        //时间
        $time = date('Y-m-d H:i:s', time());
        $data['created_at'] = $time;
        $data['updated_at'] = $time;

//        dd($data);
        $res1 = DB::table('data_rotation')->insert($data);

        if ($res1) {
            $data = [

                'message' => '删除成功'
            ];
            return redirect('/admin/guang/index')->with(['info' => '添加成功']);
        } else {
            return back()->with(['info' => '添加失败']);
        }
//         dd($data);
//        return view('');
    }
    public function delete($id)
    {
//        return 1111;
        $res = \DB::table('data_rotation')->where('id',$id)->delete();
//        $res = \DB::table('data_rotation')->where('id',$id)->select();
//       dd($res);
//        $res = Guang::find($id)->delete($id);
//        $res = Guang::find($id) -> delete();
//        dd($res);
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

    public function edit($id)
    {
        //1 通过传过来的id获取到要修改的用户记录
        $data = \DB::table('data_rotation')->find($id);
//        dd($data);

        return view('admin.guang.edit',compact('data'));

    }
    public function changeOrder(Request $request)
    {
//       排序的业务逻辑

        $input = $request->except('_token');

        // 找到要修改排序的那条记录
        $cate = Guang::find($input['id']);
//        $name = Show::find($input['name']);
//        dd($name);

//        修改这条记录的排序值为传过来的排序值
        $res = $cate->update(['sort'=>$input['cate_order']]);

        //判断是否修改成功
        if($res){
            $data = [
                'status'=>0,
                'msg'=>"排序修改成功"
            ];
        }else{
            $data = [
                'status'=>1,
                'msg'=>"排序修改失败"
            ];
        }
        return $data;
    }
    public function update(Request $request)
    {

        $data = $request->except('_token','token');
//        dd($data);
        if($request->hasFile('img'))
        {
            $file = $request->file('img');
            if($file->isValid()){
                //处理//获取图片扩展名
                $ext =  $file->getClientOriginalExtension();

                // dd($ext);}
                $filename = time().mt_rand(1000,99999).'.'.$ext;
                $res = $file->move('./uploads',$filename);
                if($res)
                {
                    $data['img'] = $filename;
                }else{
                    $data['img'] = 'default.jpg';
                }
            }else{
                $data['img'] = 'default.jpg';
            }
        }else{
            unset($data['img']);
        }
        //处理状态
        $data['status'] = 0;

        //时间
        $time = date('Y-m-d H:i:s',time());
        $data['created_at'] = $time;
        $data['updated_at'] = $time;
//dd($data);
        $id = $data['id'];

        unset($data['id']);

        $res1 = \DB::table('data_rotation')->where('id',$id)->update($data);

        if($res1)
        {
            return redirect('/admin/guang/index')->with(['info'=>'更新成功']);
        }else{
            return back()->with(['info'=>'更新失败']);
        }
    }
    //    上架
    public function up($id,$status=0)
    {
        Guang::where('id',$id)->update(['status'=>$status]);
        return redirect('/admin/guang/index');

    }
    //    下架
    public function down($id,$status=1)
    {
        Guang::where('id',$id)->update(['status'=>$status]);
        return redirect('/admin/guang/index');

    }
}
