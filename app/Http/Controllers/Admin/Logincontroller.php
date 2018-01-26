<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Org\code\Code;
use App\Model\User;
require_once app_path().'/Org/code/Code.class.php';

class Logincontroller extends Controller
{
    //返回后台登录页面
    public function login()
    {
        return view('admin.login');
    }
    //后台登录页面的验证码
    public function code()
    {
        $code = new Code();
        return $code -> make();
    }
    //处理登录逻辑的
    public function dologin(Request $request)
    {
        //1. 获取用户提交过来的登录数据
            $input = $request->except('_token');
        //2. 验证数据的有效性
        //Validator::make('要验证的数据','验证规则','提示信息')
            $rule = [
                'username'=>'required|between:2,18',
                'password'=>'required|between:5,18|alpha_dash',
            ];
            //提示信息
            $mess = [
                'username.required'=>'用户名不能为空',
                'username.between'=>'用户名的长度必须在5-18位',
                'password.required'=>'密码不能为空',
                'password.between'=>'密码的长度必须在5-18位',
                'password.alpha_dash'=>'密码必须是数字字母下划线',
            ];

            $validator = Validator::make($input, $rule,$mess);
        // 如果验证失败
            if ($validator->fails())
            {
                return redirect('admin/login')
                    ->withErrors($validator)
                    ->withInput();
            }
        //验证码
            if(strtolower($input['code']) != strtolower(session('code')))
            {
                return back()->with('errors','验证码错误');
            }
        //3. 判断用户名、密码、验证码的有效性
        //$input['username']
        $user = User::where('name',$input['username'])->first();
        //如果没有此用户，返回没有此用户的错误提示
            if (! $user)
            {
                return back()->with('errors','无此用户');
            }
        //账户被禁用
            if ($user->status == 0)
            {
                return back()->with('errors','账户被禁用');
            }
        //密码不正确
            if(Crypt::decrypt($user->password) != $input['password']){
                return back()->with('errors','密码错误');
            }

        //4. 如果有效就登录到后台，验证失败就返回到添加页面
        //将用户的登录状态保存到session

            Session::put('adminuser',$user);
            return redirect('admin/index');

    }

    //忘记密码
    public function forget(Request $request)
    {
        return view('admin.login.forget');
    }
    //忘记密码执行
    public function doforget(Request $request)
    {
        //1. 获取用户需要找回密码的账号
        $email = $request->email;

        $user = User::where('email',$email)->first();
//        dd($user);

//        2. 验证账号的安全性（通过向此账号发送邮件来确认此邮箱是用户的真实邮箱）
        if($user){
            Mail::send('admin.emails.forget', ['user' => $user], function ($m) use ($user) {

                $m->to($user->email, $user->name)->subject('找回密码!');
            });

            return '重置密码的邮件已经发送，请前往邮箱查看，重置您的账号密码';
        }
    }
    //重置密码
    public function reset(Request $request)
    {
        // 检测请求的有效性
        $user = User::find($request->id);

        if($user->token != $request->token){
            return '请通过您的邮箱中的重置链接来重置您的密码';
        }
        //返回密码重置页面

        return view('admin.login.reset',compact('user'));
    }
    //重置密码执行
    public function doreset(Request $request)
    {
        //1. 接受需要重置的账号、密码
        $name = $request->name;
//        dd($pass);
//        $user = User::where('name',$name)->first();
//        $users = $user->password;
//        dd($users);
        $pass = Crypt::encrypt($request->newpass);


//        2. 找到要修改密码的账号，执行修改操作

//        $res = $user->update(['password'=>$pass]);
        $res = DB::table('data_admin_users')->where('name',$name)->update(['password' => $pass]);

        if($res){
            return redirect('admin/login')->with('msg','密码重置成功');
        }else{
            return '密码重置失败，请重新设置密码';
        }
    }

    //后台首页
    public function index()
    {
        return view('admin.index');
    }

    //退出登录
    public function logout()
    {
        session()->forget('adminuser');
        return redirect('admin/login');
    }

    //未授权页面
    public function auth()
    {
        return view('admin.errors.auth');
    }
}
