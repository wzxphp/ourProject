<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Home\Pro;
use Session;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function center()
    {
    	return view('Home/user/center');
    }

    public function userinfo()
    {
    	return view('Home/user/userinfo');
    }

    public function userinfo_create(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'true_name' => 'required',
                'email' => 'required|email'
            ],[
                'name.required' => '请填写昵称',
                'true_name.required' => '请填写姓名',
                'email.required' => '请输入邮箱',
                'email.email' => '请正确填写邮箱'
            ]);
        $userdata = $request->except('_token');
        // dd($userdata);
        if($request->file('avatar')){
//            获取上传图片文件
            $file = $request->file('avatar');

            // 判断上传文件的有效性
            if ($file->isValid()) {

                $entension = $file->getClientOriginalExtension();//上传文件的后缀名

                // 生成新的文件名
                $newName = date('YmdHis') . mt_rand(1000, 9999) . '.' . $entension;
                // 将文件移动到指定位置
                $path = $file->move(public_path() . '/myuploads', $newName);
                // 返回上传文件图片  显示到浏览器上面
                $url = '/myuploads/' . $newName;
                // 把所保存的图片位置放入到字段中去
                $userdata['avatar'] = $url;
                $res = \DB::table('data_user_message')->where('email', $userdata['email'])->update($userdata);

                if ($res) {
                    return view('Home/user/userinfo')->with(['info' => '更新成功']);
                } else {
                    return back()->with(['info' => '添加失败']);
                }
            }else{
                return back()->with(['info'=>'文件上传无效']);
            }
        }else{
                return back()->with(['info'=>'没有文件上传']);
            }
    }


    public function safe()
    {
    	return view('Home/user/safe');
    }

    public function password($email)
    {
    	return view('Home/user/password',['email'=>$email]);
    }

    public function dopass(Request $request)
    {
        $data = $request->all();

        $res = \DB::table('data_user_message')->where('email',$data['email'])->first();

        if(!Hash::check($data['password'],$res->password) )
        {
            return back()->with(['info'=>'原密码输入有误']);
        }

            $this->validate($request,[
                'password' => 'required',
                'newpass' => 'required',
                'repass' => 'required|same:newpass'
            ],[
                'password.required' => '请填写原密码',
                'newpass.required' => '请输入新密码',
                'repass.required' => '请确认密码',
                'repass.same' => '两次输入不一致' 
            ]);

            $data = $request->except('_token','repass','password','email');

            $data['newpass'] = Hash::make($data['newpass']);

            $pass = \DB::table('data_user_message')
                    ->where('email',$res->email)
                    ->update(['password'=>$data['newpass']]);

            $pass1 = \DB::table('data_user_register')
                    ->where('email',$res->email)
                    ->update(['password'=>$data['newpass']]);


            if($pass && $pass1)
            {
                return redirect('/home/loginout')->with(['info'=>'密码修改成功,请登录']);
            }else{
                return back()->with(['info'=>'密码修改失败']);
            }
 
    }

    public function address()
    {
        $addr = \DB::table('data_user_address')->get();

        $pro = \DB::table('data_pro_city')->where('LevelType','1')->get();

        $city = \DB::table('data_pro_city')->where('LevelType','2')->get();

        $town = \DB::table('data_pro_city')->where('LevelType','3')->get();

    	return view('Home/user/address',compact('addr','pro','city','town'));
    }

        //获取地址信息
    public function ajax(Request $request)
    {
        $prodata = $request ->input('val');
        $data['pro'] = Pro::where('ParentId',100000)->get();
        $data['city'] = Pro::where('ParentId',$prodata)->get();
        $first = Pro::where('ParentId',$prodata)->first();
        $data['town'] = Pro::where('ParentId',$first->id)->get();
        return $data;
    }

    public function doadd(Request $request)
    {
        $this -> validate($request,[
                'name' => 'required|',
                'tel' => 'required|size:11',
                'address' => 'required',
                'detail_address' => 'required'
            ],[
                'name.required' => '请填入收货人名称',
                'tel.required' => '请填入电话',
                'address.required' => ' 请填入地址',
                'detail_address.required' => '请填入详细地址',
            ]);
        $user = \DB::table('data_user_message')->first();
        $data['user_id'] = $user->user_id;
        // $data = $request->except('_token');
        $data['name'] = $request->input('name');
        $data['tel'] = $request->input('tel');
        $data['address'] = $request->input('address');
        $data['detail_address'] = $request->input('detail_address');
        

        $res = \DB::table('data_user_address')->insert($data);
        if($res)
        {
            return back()->with(['info'=>'地址添加成功']);
        }else{
            return back()->with(['info'=>'地址添加失败']);
        }
        
    }

    public function edit($id)
    {
        $addr = \DB::table('data_user_address')->get();

        $pro = \DB::table('data_pro_city')->where('LevelType','1')->get();

        $city = \DB::table('data_pro_city')->where('LevelType','2')->get();

        $town = \DB::table('data_pro_city')->where('LevelType','3')->get();

        $data = \DB::table('data_user_address')->where('id',$id)->first();
        // $data = \DB::table('data_user_address')->find($id);
        // dd($data);
        return view('/Home/user/edit',compact('addr','pro','city','town','data'));
    }

    public function update(Request $request)
    {
        $id = $request->input('id');

        $this -> validate($request,[
            'name' => 'required|',
            'tel' => 'required|size:11',
            'address' => 'required',
            'detail_address' => 'required'
        ],[
            'name.required' => '请填入收货人名称',
            'tel.required' => '请填入电话',
            'tel.size' => '请正确填入电话',
            'address.required' => ' 请填入地址',
            'detail_address.required' => '请填入详细地址',
        ]);
        $data = $request->except('_token');

        $res = \DB::table('data_user_address')->where('id',$id)->update($data);

        if($res)
        {
            return redirect('/home/center/address')->with(['info'=>'修改成功']);
        }else{
            return back()->with(['info'=>'修改失败']);
        }
    }

    public function del($id)
    {
        $res = \DB::table('data_user_address')->where('id',$id)->delete();
        if($res)
        {
            return back()->with(['msg'=>'删除成功']);
        }else{
            return back()->with(['msg'=>'删除失败']);
        }
    }
}
