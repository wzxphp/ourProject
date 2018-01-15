<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>{{ $title }}</title>
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>

  <link rel="stylesheet" href="/home/login/css/style.css">
  <script type="text/javascript" src="/home/login/jquery-1.8.3.min.js"></script>

  
</head>

<body style="background:rgba(60,60,120,0.7);">
  <p class="tip"></p>
<div class="cont">
  <div class="form sign-in">
  <form action="{{ url('home/login/dologin') }}" method="POST">
    {{ csrf_field() }}
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session('info'))
      <div class="alert alert-info">
        {{ session('info') }}
      </div>
    @endif
    <h2>欢迎登陆</h2>
    <label>
      <span>用户名</span>
      <input type="email" name="email" value="{{ old('email') }}" />
    </label>
    <label>
      <span>密码</span>
      <input type="password" name="password" />
    </label>
    <p class="forgot-pass"><a href="{{ url('/home/forgot/forpass') }}">忘记密码?</a></p>
    <button type="submit" class="submit">登录</button>
    <button type="button" class="fb-btn"><span>facebook</span>  登录 </button>
    </form>
  </div>
  <div class="sub-cont" >
    <div class="img">
      <div class="img__text m--up">
        <h2>还没有账号?</h2>
        <p>快来注册一个!</p>
      </div>
      <div class="img__text m--in">
        <h2>已有账号?</h2>
        <p>那快登录吧!</p>
      </div>
      <div class="img__btn">
        <span class="m--up">注册</span>
        <span class="m--in">登录</span>
      </div>
    </div>
    <div class="form sign-up">
      <form action="{{ url('home/register/send') }}" method="POST">
        {{ csrf_field() }}
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label>
          <span>用户名</span>
          <input type="text" name="name" value="{{ old('name') }}"/>
        </label>
        <label>
          <span>邮箱</span>
          <input type="email" name="email" value="{{ old('email') }}"/>
        </label>
        <label>
          <span>密码</span>
          <input type="password" name="password"/>
        </label>
        <label>
          <span>确认密码</span>
          <input type="password" name="repassword"/>
        </label>
        <button type="submit" class="submit">注册</button>
        <button type="button" class="fb-btn"> <span>facebook</span>注册 </button>
      </form>
    </div>
  </div>
</div>


<a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
  
  <script src="/home/login/js/index.js"></script>

</body>
</html>
