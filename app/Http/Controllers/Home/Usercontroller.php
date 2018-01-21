<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $res = \DB::table('data_user_message')->where('email',$userdata['email'])->update($userdata);

        if($res)
        {
            return view('home/user/userinfo')->with(['info'=>'修改成功']);
        }else{
            return back()->with(['info'=>'添加失败']);
        }
       
    }

    public function safe()
    {
    	return view('Home/user/safe');
    }

    public function password()
    {
    	return view('Home/user/password');
    }

    public function address()
    {
    	return view('Home/user/address');
    }
}
