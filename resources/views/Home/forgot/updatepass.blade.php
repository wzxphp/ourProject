<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>修改密码</title>
	<style>
        *{
            margin:0;
            padding: 0;
            box-sizing: border-box;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .outer{
            position: relative;
            margin:20px auto;
            width: 200px;
            height: 30px;
            line-height: 28px;
            border:1px solid #ccc;
            background: #ccc9c9;
        }
        .outer span,.filter-box,.inner{
            position: absolute;
            top: 0;
            left: 0;
        }
        .outer span{
            display: block;
            padding:0  0 0 36px;
            width: 100%;
            height: 100%;
            color: #fff;
            text-align: center;
        }
        .filter-box{
            width: 0;
            height: 100%;
            background: green;
            z-index: 9;
        }
        .outer.act span{
            padding:0 36px 0 0;
        }
        .inner{
            width: 36px;
            height: 28px;
            text-align: center;
            background: #fff;
            cursor: pointer;
            font-family: "宋体";
            z-index: 10;
            font-weight: bold;
            color: #929292;
        }
        .outer.act .inner{
            color: green;
        }
        .outer.act span{
            z-index: 99;
        }
  </style>
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans'>

  <link rel="stylesheet" href="{{ asset('/home/login/css/style.css') }}">
  <script type="text/javascript" src="{{ asset('/home/login/jquery-1.8.3.min.js') }}"></script>

  
</head>

<body style="background:rgba(60,60,120,0.7);">
  <p class="tip"></p>
<div class="cont">
  <div class="form sign-in">
      <form action="{{ url('/home/forgot/update') }}" method="POST">
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
          <span>新密码</span>
          <input type="password" name="password"/>
        </label>
        <label>
          <span>确认密码</span>
          <input type="password" name="repass"/>
        </label>
        <input type="hidden" name="email" value="{{ $email }}">
		<label>
		  <div class="outer">
		    <div class="filter-box"></div>
		    <span>
		        滑动解锁
		    </span>
		    <div class="inner">&gt;&gt;</div>
		  </div>    
		</label>
        <button id="submit" disabled type="submit" class="submit">提交</button>
      </form>
  </div>
  <div class="sub-cont" >
    <div class="img">
      <div class="img__text m--up">
        <h2>忘记密码?</h2>
        <p>找回密码吧!</p>
      </div>
<!--       <div class="img__text m--in">
        <h2>密码记得牢</h2>
        <p>那快登录吧!</p>
      </div> -->
<!--       <div class="img__btn">
        <span class="m--up">找回密码</span>
        <span class="m--in">登录</span>
      </div> -->
    </div>
    <div class="form sign-up">

    </div>
  </div>
</div>


<a href="https://dribbble.com/shots/3306190-Login-Registration-form" target="_blank" class="icon-link">
  <img src="http://icons.iconarchive.com/icons/uiconstock/socialmedia/256/Dribbble-icon.png">
</a>
<a href="https://twitter.com/NikolayTalanov" target="_blank" class="icon-link icon-link--twitter">
  <img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/twitter-128.png">
</a>
  
  <script src="{{ asset('/home/login/js/index.js') }}"></script>
  <script>
      $(function(){
          $(".inner").mousedown(function(e){
              var el = $(".inner"),os = el.offset(),dx,$span=$(".outer>span"),$filter=$(".filter-box"),_differ=$(".outer").width()-el.width();
              $(document).mousemove(function(e){
                  dx = e.pageX - os.left;
                  if(dx<0){
                      dx=0;
                  }else if(dx>_differ){
                      dx=_differ;
                  }
                  $filter.css('width',dx);
                  el.css("left",dx);
              });
              $(document).mouseup(function(e){
                  $(document).off('mousemove');
                  $(document).off('mouseup');
                  dx = e.pageX - os.left;
                  if(dx<_differ){
                      dx=0;
                      $span.html("滑动解锁");
                  }else if(dx>=_differ){
                      dx=_differ;
                      $(".outer").addClass("act");
                      $span.html("验证通过！");
                      $('#submit').attr('disabled',false);
                      el.html('&radic;');
                  }
                  $filter.css('width',dx);
                  el.css("left",dx);

              })
          })
      })
  </script>
</body>
</html>
