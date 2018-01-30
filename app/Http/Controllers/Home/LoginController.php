<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

// use App\Org\code\Code;
// require_once app_path().'/Org/code/Code.class.php';
// use Illuminate\Support\Facades\Session;
use Session;

class LoginController extends Controller
{
    //引入登录注册文件
    public function index()
    {
    	return view('Home.Login.index',['title'=>'欢迎登陆']);
    }

// 引入验证码
    public function code()
    {
    	$code = new Code();
    	return $code->make();
    }

// 登录操作
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
    	$user = \DB::table('data_user_message')
    				->where('email',$data['email'])
    				->first();

    	if(!$user)
    	{
    		return redirect('home/login/index')->with(['info'=>'账号或密码输入有误']);
    	}
// 密码解密
    	$password = decrypt($user->password);
// 验证密码
    	if($data['password'] !== $password)
    	{
    		return redirect('home/login/index')->with(['info'=>'账号或密码输入有误']);
    	}else{
    		Session::put('home_user',$user);
            return redirect('home/index');
    	}
    }

    public function loginout()
    {
        Session()->forget('home_user');
        
        return view('home/login/index');

    }

// 注册账号发送邮件验证
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
// 邮箱是否重复注册
    	$user = \DB::table('data_user_register')
    			->where('email',$data['email'])
    			->first();
    	if($user)
    	{
    		return back()->with(['info'=>'邮箱已被注册']);
    	}
// 密码加密
    	$data['password'] = encrypt($data['password']);

// 将用户注册信息加入用户注册信息表
    	$res = \DB::table('data_user_register')->insert($data);

// 将用户注册信息加入用户详细信息表
    	$userdata = \DB::table('data_user_register')
    				->where('email',$data['email'])
    				->get()
    				->toArray();
    	
    	$arr=[];
    	foreach($userdata as $k=>$v)
    	{
    		$arr['user_id']=$v->user_id;
    		$arr['name'] = $v->name;
    		$arr['email'] = $v->email;
    		$arr['password'] = $v->password;
    	}
    	
    	$res1 = \DB::table('data_user_message')->insert($arr);

    	if($res && $res1)
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

// 引入忘记密码操作页面
    public function forpass()
    {
    	return view('/Home/forgot/index');
    }

// 验证邮箱
    public function dopass(Request $request)
    {
    	$data = $request->all();

    	$user = \DB::table('data_user_register')->where('email',$data['email'])->first();

    	if($user)
    	{
    		Mail::send('Home/mails/pass',['data'=>$user->email,'name'=>$data['name']],function($message)use($data){
				$message->to($data['email'])->subject('密码修改中');
			});
    	}else{
    		return redirect('home/login/index')->with(['info'=>'邮箱未注册']);
    	}

// 邮件发送成功，提醒密码修改
		return view('Home/forgot/email');
    }

// 从邮箱链接修改密码页面
    public function updatepass($email)
    {
    	return view('Home/forgot/updatepass',['email'=>$email]);
    }

// 执行修改
    public function update(Request $request)
    {    
        // 密码修改逻辑
    	// 验证
    	$this->validate($request,[
    			'password' => 'required|min:6',
    			'repass' => 'required|same:password'
    		],[
    			'password.required' => '密码输入不能为空',
    			'password.min' => '密码太短了',
    			'repass.required' => '请确认密码',
    			'repass.same' => '两次输入不一致'
    		]);
    	$pass = $request->except('_token','repass');
    	$pass['password'] = encrypt($pass['password']);

    	$res = \DB::table('data_user_message')
    			->where('email',$pass['email'])
    			->update($pass);    	

    	$res1 = \DB::table('data_user_register')
    			->where('email',$pass['email'])
    			->update($pass);

    	if($res && $res1)
    	{
    		return redirect('home/login/index')->with(['info'=>'密码修改成功']);
    	}else{

    		return redirect('home/forgot/updatepass')->with(['info'=>'密码修改失败']);
    	}
    }




}
