<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class LoginController extends Controller
{
    //引入登录注册文件
    public function index()
    {
    	$title = '登录麦博';
    	return view('Home.Login.index',['title'=>$title]);
    }

    public function dologin(Request $request)
    {
    	$this->validate($request,[
               'email' => 'required',
               'password' => 'required'
    		],[
               'email.required' => '请用邮箱登录',
               'password.required' => '密码不能为空'
    		]);
    	$data = $request->except('_token');
    	$homedata = \DB::table('data_user_register')->where('email',$data['email'])->first();
    	$password = decrypt($homedata->password);
    	if($data['password']==$password)
    	{
    		return redirect('home/index');
    	}else{
    		return back();
    	}
    }

    public function send(Request $request)
    {
    	$this->validate($request,[
    			'name' => 'required|max:64',
    			'email' => 'required|email',
    			'password' => 'required|min:6',
    			'repassword' => 'required|same:password'
    		],[
    			'name.required' => '用户名不嫩为空哦',
    			'name.max' => '用户名不嫩太长哦',
    			'email.required' => '密码不能为空哦',
    			'email.email' => '要填邮箱哦，不能乱填哦',
    			'password.required' => '密码不能为空哦',
    			'password.min' => '密码太短哦',
    			'repassword.required' => '请确认密码',
    			'name.same' => '两次输入必须一致哦',
    		]);

    	
    	$data = $request->except('_token','repassword');
// 密码加密
    	$data['password'] = encrypt($data['password']);

// 将用户注册信息加入用户注册信息表
    	$res = \DB::table('data_user_register')->insert($data);
// 将用户注册信息加入用户详细信息表
    	// $userdata = \DB::table('data_user_register')->where('email',$data['email'])->get()->toArray();

    	// dd($userdata);
    	
    	// $res1 = \DB::table('data_user_message')->insert($userdata);
    	if($res)
    	{
    	    // 发送邮件
		  Mail::send('Home/mails/active',['data'=>$data,'name'=>$data['name']],function($message)use($data){
				$message->to($data['email'])->subject('欢迎注册');
			});

		  return redirect('/home/login/index')->with(['info'=>'注册成功,请登录']);
    	}else{
    	  return back()->with(['info'=>'注册失败']);
    	}

    }

// 忘记密码操作
    public function forpass()
    {
    	return view('/Home/forgot/index');
    }

    public function dopass(Request $request)
    {
    	$data = $request->all();

	    Mail::send('Home/mails/pass',['data'=>$data,'name'=>$data['name']],function($message)use($data){
			$message->to($data['email'])->subject('密码修改中');
		});
// 邮件发送成功，提醒密码修改
		return view('Home/forgot/email');
    }

    public function updatepass()
    {
    	return view('Home/forgot/updatepass');
    }

    public function update()
    {

    }




}
