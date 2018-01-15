<?php

namespace App\Http\Controllers\Admin;

use session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Org\code\Code;
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
                'username'=>'required|between:5,18',
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
            if($input['code'] != session('code'))
            {
                return back()->with('errors','验证码错误');
            }
        //3. 判断用户名、密码、验证码的有效性
        //$input['username']
            $user = User::where('user_name',$input['username'])->first();
        //如果没有此用户，返回没有此用户的错误提示
            if (! $user)
            {
                return back()->with('errors','无此用户');
            }

        //密码不正确
            if(Crypt::decrypt($user->user_pass) != $input['password']){
                return back()->with('errors','密码错误');
            }

        //4. 如果有效就登录到后台，验证失败就返回到添加页面
        //将用户的登录状态保存到session

            Session::put('user',$user);
            return redirect('admin/index');

    }
    //后台首页
    public function index()
    {
        return view('admin.index');
    }




}
