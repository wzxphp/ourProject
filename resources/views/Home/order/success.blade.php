@extends('Home.user.centerlayout')

@section('content')
<div>
<div class="take-delivery">
 <div class="status">
   <h2>订单提交成功</h2>
   <div class="successInfo">
     <ul>
       <div class="user-info">
         <p>收货人：{{ Session('home_user')->name }}</p>
       </div>

     </ul>
     <div class="option">
       <span class="info">您可以</span>
        <a href="{{url('/home/center/order')}}" class="J_MakePoint">查看<span>已买到的宝贝</span></a>
     </div>
    </div>
  </div>
</div>
</div>

@stop