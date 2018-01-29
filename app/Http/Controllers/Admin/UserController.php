<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Model\Admin\Buser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{


    public function deleted(Request $request)
    {
        $allData = Buser::get()->where('status','0');
        $data =  DB::table('data_user_message')
            ->where(function($query) use($request){
                //检测关键字
                $username = $request->input('username');
                $mindate = $request->input('mindate');
                $maxdate = $request->input('maxdate');
                //如果用户名不为空
                if(!empty($username)) {
                    $query->where('true_name','like','%'.$username.'%');
                }
                //如果日期不为空
                if(!empty($mindate)){
                    $query->whereBetween('created_at',[$mindate,$maxdate]);
                }
                //过滤掉已删除状态的
                $query->where('status','0');
            })->simplePaginate(10);
        return view('admin.user.del',['data'=>$data,'allData'=>$allData]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $allData = Buser::get()->where('status','1');   //获取总共有多少会员
        $data =  DB::table('data_user_message')
                ->where(function($query) use($request){
              //检测关键字
                $username = $request->input('username');
                $mindate = $request->input('mindate');
                $maxdate = $request->input('maxdate');
              //如果用户名不为空
                if(!empty($username)) {
                    $query->where('true_name','like','%'.$username.'%');
                }
              //如果日期不为空
                if(!empty($mindate)){
                    $query->whereBetween('created_at',[$mindate,$maxdate]);
                }
              //过滤掉已删除状态的
                    $query->where('status','1');
                })->simplePaginate(10);
        return view('admin.user.list',['data'=>$data,'allData'=>$allData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Buser::find($id);
        return view('admin.user.edit',['user'=>$user]);
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
        $user = Buser::find($id);
        $user->name = $input['name'];
        $user->true_name = $input['true_name'];
        $user->sex = $input['sex'];
        $user->name = $input['name'];
        $user->birthday = $input['birthday'];
        $user->tel = $input['tel'];
        $user->email = $input['email'];

        $res = $user->save();
        if($res){
            return redirect('admin/user')->with('msg','修改成功');
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
        $res = Buser::find($id)->delete();
        //如果删除成功
        if($res){
            $data = ['status'=>0, 'message'=>'删除成功'];
        }else{
            $data = ['status'=>1, 'message'=>'删除失败'];
        }

        return $data;
    }

    //会员删除状态
    public function statu($id)
    {
        $user =  Buser::find($id);
        $user -> status = '0';
        $res = $user -> save();
        //如果修改成功
        if($res){
            return redirect('admin/user')->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        }
    }
    //会员恢复状态
    public function statu2($id)
    {
        $user =  Buser::find($id);
        $user -> status = '1';
        $res = $user -> save();
        //如果修改成功
        if($res){
            return redirect('admin/user/deleted')->with('msg','恢复成功');
        }else{
            return back()->with('msg','恢复失败');
        }
    }

    //查看会员头像
    public function showav(Request $request)
    {
        $id = $request->id;
        $av =  Buser::find($id)->avatar;
        $str = "<img width='300' height='300' src='".$av."'>";
        return $str;
    }

}
