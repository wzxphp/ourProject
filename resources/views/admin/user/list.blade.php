@extends('admin.layout')
@section('title','会员列表')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
      <div class="content">
          {{--面包屑导航--}}
          <blockquote class="layui-elem-quote">
              <a href="{{url('admin/index')}}">后台首页</a>/
              <a href="">会员管理</a>/
              <a href="">会员列表</a>
          </blockquote>
          <div>
              @if(session('msg'))
                  <h3>{{session('msg')}}</h3>
              @endif
          </div>
          <!-- 右侧内容框架，更改从这里开始 -->
        <form class="layui-form xbs" action="" >
            <div class="layui-form-pane" style="text-align: center;">
              <div class="layui-form-item" style="display: inline-block;">
                <label class="layui-form-label xbs768">日期范围</label>
                <div class="layui-input-inline xbs768">
                  <input class="layui-input" placeholder="开始日" name="mindate" autocomplete="off" id="LAY_demorange_s">
                </div>
                <div class="layui-input-inline xbs768">
                  <input class="layui-input" placeholder="截止日" name="maxdate" autocomplete="off" id="LAY_demorange_e">
                </div>
                <div class="layui-input-inline">
                  <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                </div>
                <div class="layui-input-inline" style="width:80px">
                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                </div>
              </div>
            </div>
        </form>
        <xblock>
            <button class="layui-btn layui-btn-normal" onclick=""><i class="layui-icon">&#xe63a;</i>会员删除</button>
            <span class="x-right" style="line-height:40px">共有数据：{{count($allData)}} 条</span>
        </xblock>
        <table class="layui-table">
            <thead>
                <tr>
                    <th>
                        <input type="checkbox" onclick="checkBox($(this));" name="" value="">
                    </th>
                    <th>Uid</th>
                    <th>用户名</th>
                    <th>姓名</th>
                    <th>性别</th>
                    <th>生日</th>
                    <th>手机</th>
                    <th>邮箱</th>
                    <th>加入时间</th>
                    {{--<th>状态</th>--}}
                    <th>操作</th>
                </tr>
            </thead>
            @foreach($data as $k=>$v)
            <tbody>
                <tr>
                    <td><input type="checkbox" class="mybox" value="1" name=""></td>
                    <td>{{$v->user_id}}</td>
                    <td>
                        <u style="cursor:pointer" onclick="member_show({{$v->user_id}})">{{$v->name}}</u>
                        {{--<a href="javascript:;" onclick="member_show({{$v->user_id}})">{{$v->name}}</a>--}}
                    </td>
                    <td >{{$v->true_name}}</td>
                    <td >
                        @if($v->sex == '0') 保密
                        @elseif($v->sex == '1') 男
                        @elseif($v->sex == '2') 女
                        @endif
                    </td>
                    <td >{{$v->birthday}}</td>
                    <td >{{$v->tel}}</td>
                    <td >{{$v->email}}</td>
                    <td>{{$v->created_at}}</td>
                    {{--<td class="td-status">--}}
                        {{--<span class="layui-btn layui-btn-normal layui-btn-mini">--}}
                            {{--已启用--}}
                        {{--</span>--}}
                    {{--</td>--}}
                    <td class="td-manage">
                        {{--<a style="text-decoration:none" onclick="member_stop(this,'10001')" href="javascript:;" title="停用">--}}
                            {{--<i class="layui-icon">&#xe601;</i>--}}
                        {{--</a>--}}
                        <a title="编辑" href="{{ url('admin/user/'.$v->user_id.'/edit') }}" class="ml-5" style="text-decoration:none">
                            <i class="layui-icon">&#xe642;</i>
                        </a>
                        <a title="删除"  onclick="return confirm('你确认删除吗？')" href="{{url('admin/user/statu/'.$v->user_id)}}" style="text-decoration:none">
                            <i class="layui-icon">&#xe640;</i>
                        </a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        <!-- 右侧内容框架，更改从这里结束 -->
          <div class="layui-show">
              {!! $data->render() !!}
          </div>
      </div>
    </div>
    <!-- 右侧主体结束 -->

    <!-- 页面动态效果 -->
    <script>

        layui.use(['laydate'], function(){
          laydate = layui.laydate;//日期插件

          //以上模块根据需要引入
          //
          var start = {
            min: '2018-01-01 00:00:00'
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
              end.min = datas; //开始日选好后，重置结束日的最小日期
              end.start = datas //将结束日的初始值设定为开始日
            }
          };
          
          var end = {
            min:'2018-01-01 00:00:00'
            ,max: '2099-06-16 23:59:59'
            ,istoday: false
            ,choose: function(datas){
              start.max = datas; //结束日选好后，重置开始日的最大日期
            }
          };
          
          document.getElementById('LAY_demorange_s').onclick = function(){
            start.elem = this;
            laydate(start);
          }
          document.getElementById('LAY_demorange_e').onclick = function(){
            end.elem = this
            laydate(end);
          }
          
        });

         //当全选框被选中，单选框全被选中
        function checkBox(obj) {
            if (obj.is(":checked")) {
                $('input.mybox').prop('checked', true);
            }else{
                //当全选框被取消，单选框全被取消
                $('input.mybox').prop('checked', false);
            }
        }

        /*用户-查看*/
        function member_show(id){
//            x_admin_show('123','admin/user/showav','300','300');
            $.post('user/showav',{"_token":"{{csrf_token()}}",'id':id},function(data){
                layer.open({
                    type: 1,
                    area: ['300px', '300px'], //宽高
                    content: data,
                    title: false,
                    closeBtn: 0,
                    skin: 'layui-layer-nobg', //没有背景色
                    shadeClose: true
                });
            })
        }

        // 用户-编辑
        function member_edit (title,url,id,w,h) {

        }

        /*用户-删除*/
        function delUser(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $.post('{{ url('admin/user/statu') }}',{'_token':"{{csrf_token()}}",'id':id},function (data) {
                    if(data.status == 0) {
                        $(obj).parents("tr").remove();
                        layer.msg(data.message, {icon: 1, time: 1000});
                    }else{
                        layer.msg(data.message, {icon: 1, time: 1000});}
                });
            });
        }

        //批量删除提交
        function delAll () {
            layer.confirm('确认要删除吗？',function(index){

                //获取被选中用户的id
                var id_array=new Array();//定义一个空数组
                $("input[type='checkbox']:checked").each(function(){
                    var id = $(this).parent().next().text();
                    id_array.push(id);
                });

                var ids = JSON.stringify(id_array);

                //捉到所有被选中的，发异步进行删除
                $.post('{{ url('admin/admin_user_del') }}',{'_token':"{{csrf_token()}}",'admin_ids':ids},function (data) {
                    if(data.status == 0) {
                        $("input[type='checkbox']:checked").parents("tr").remove();
                        layer.msg(data.message, {icon: 1, time: 1000});
                    }else{
                        alert('删除失败');
                        layer.msg(data.message, {icon: 1, time: 1000});}
                });
            });
        }
        </script>
@endsection