<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Model\User;
use App\Model\Admin\Role;
use DB;

class Admin_userController extends Controller
{
    //授权
    public function auth($id)
    {
        //根据id找到相关的用户U
        $user = User::find($id);

        //获取角色列表
        $roles = Role::get();

        //获取当前用户已经拥有的角色列表
        $own_roles = $user->roles;
        //存放当前用户拥有的角色的id
        $own = [];
        foreach ($own_roles as $v){
            $own[] = $v->id;
        }
        return view('admin.admin_user.auth',compact('user','roles','own'));
    }

    //处理用户授权操作

    public function doAuth(Request $request)
    {
        //1. 获取传过来的参数（要授权的用户的ID，要授予的角色的ID）
        $input = $request->except('_token');

        //2. 提交到user_role这个关联表中
        //开启事务
        DB::beginTransaction();
        try{
            //删除当前用户的所有权限
            DB::table('data_adminuser_role')->where('admin_user_id', $input['admin_user_id'])->delete();

            if(!empty($input['role_id'])){
                //关联表中记录（给用户授权）前，应该检查一下，当前用户是否已经拥有了此角色，如果没有再添加
                foreach ($input['role_id'] as $v){
                    DB::table('data_adminuser_role')->insert(
                        ['admin_user_id' => $input['admin_user_id'], 'role_id' => $v]);
                }
            }
            DB::commit();
            return redirect('admin/admin_user/auth/'.$input['admin_user_id'])->with('msg','添加成功');
        }catch(Exception $e){
            DB::rollBack();
            return redirect()->back()
                    ->withErrors(['error' => $e->getMessage()]);
        }
    }

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
                $maxdate = $request->get('maxdate');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('name','like','%'.$username.'');
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
                $data = ['status'=>0, 'message'=>'删除成功'];
            }else{
                $data = ['status'=>1, 'message'=>'删除失败'];
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
            $data = ['status'=>0, 'message'=>'删除成功'];
        }else{
            $data = ['status'=>1, 'message'=>'删除失败'];
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
        }else{
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
