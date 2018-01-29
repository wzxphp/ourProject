<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Model\User;
use DB;

class Admin_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allData = User::get();   //获取总共有多少管理员

        $data =  DB::table('data_admin_users')
                ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
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
                })->simplePaginate(10);

        return view('admin.admin_user.list',['data'=>$data,'allData' =>$allData]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin_user.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ///1.获取表单传值
            $input = $request -> all();
        //2.将数据插入数据库
            $user = new User();
            $user->name = $input['username'];
            $user->tel = $input['tel'];
            $user->email = $input['email'];
            $user->password = Crypt::encrypt($input['pass']);
            $res = $user->save();
        //4. 判断是否添加成功
            if($res){
                return redirect('admin/admin_user')->with('msg','添加成功');
            }else{
                return back()->with('msg','添加失败');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //1 通过传过来的id获取到要修改的用户
        $user = User::find($id);
        return view('admin.admin_user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        //使用模型修改表记录
        $user = User::find($id);
        $user->name = $input['username'];
        $user->tel = $input['tel'];
        $user->email = $input['email'];
        if(!empty($input['pass'])){
            if($input['pass'] == Crypt::decrypt($user->password))
            {
                $user->password = Crypt::encrypt($input['newpass']);
            }else{
                return back()->with('msg','原密码错误');
            }
        }
        $res = $user->save();
        if($res){
            return redirect('admin/admin_user')->with('msg','修改成功');
        }else{
            return back()->with('msg','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            //删除一行
            $res = User::find($id)->delete();
            //如果删除成功
            if($res){
                $data = ['status'=>0, 'message'=>'1删除成功'];
            }else{
                $data = ['status'=>1, 'message'=>'1删除失败'];
            }

        return $data;
    }
    //删除多行
    public function delAll(Request $request)
    {

        $ids = $request->admin_ids;
        //将穿过来的数据转成数组
        $ids = json_decode($ids,true);
        //删除多行
        $res =  DB::table('data_admin_users')->whereIn('id', $ids)->delete();
        //如果删除成功
        if($res){
            $data = ['status'=>0, 'message'=>'2删除成功'];
        }else{
            $data = ['status'=>1, 'message'=>'2删除失败'];
        }
        return $data;
    }

    //修改管理员状态
    public function statu(Request $request)
    {
        $id = $request -> close;
        $user =  User::find($id);
        if($user -> status == '0'){
            $user -> status = '1';
        }elseif($user -> status == '1'){
            $user -> status = '0';
        }
        $res = $user -> save();
        //如果修改成功
        if($res){
            $data = ['status'=>0, 'message'=>'修改状态成功'];
        }else{
            $data = ['status'=>1, 'message'=>'修改状态失败'];
        }
        return $data;
    }

}
