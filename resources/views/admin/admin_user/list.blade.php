@extends('admin.layout')
@section('title','管理员列表')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            {{--面包屑导航--}}
            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">后台管理员</a>/
                <a href="">管理员列表</a>
            </blockquote>
            <!-- 右侧内容框架，更改从这里开始 -->
            <!-- 右侧中部开始 -->
            <div>
                @if(session('msg'))
                    <h3>{{session('msg')}}</h3>
                @endif
            </div>
            <div class="page-content">
                <div class="content">
                    <!-- 右侧内容框架，更改从这里开始 -->
                    <form class="layui-form xbs" action="{{ url('admin/admin_user') }}" method="get">
                        <div class="layui-form-pane" style="text-align: center;">
                            <div class="layui-form-item" style="display: inline-block;">
                                <label class="layui-form-label xbs768">日期范围</label>
                                <div class="layui-input-inline xbs768">
                                    <input class="layui-input" placeholder="开始日" name="mindate" id="begin" autocomplete="off">
                                </div>
                                <div class="layui-input-inline xbs768">
                                    <input class="layui-input" placeholder="截止日" name="maxdate" id="over" autocomplete="off">
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
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon">&#xe640;</i>批量删除</button>
                            <button id="addbtn" class="layui-btn"><i class="layui-icon">&#xe608;</i><a href="{{ url('admin/admin_user/create') }}">添加</a></button>
                            <span class="x-right" style="line-height:40px">总共有数据：{{count($allData)}}条</span>
                    </xblock>
                    <table id="tid" class="layui-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" onclick="checkBox($(this));" name="" value=""></th>
                            <th> ID </th>
                            <th> 用户名 </th>
                            <th> 手机号 </th>
                            <th> 邮箱 </th>
                            <th> 加入时间 </th>
                            <th>状态</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $k=>$v)
                        <tr>
                            <td><input type="checkbox" class="mybox" value="1" name=""></td>
                            <td>{{ $v->id }}</td>
                            <td>
                                <u style="cursor:pointer" onclick="member_show('张三','member-show.html','10001','360','400')">
                                    {{ $v->name }}
                                </u>
                            </td>
                            <td>{{ $v->tel }}</td>
                            <td>{{ $v->email }}</td>
                            <td>{{ $v->created_at }}</td>
                            <td class="td-status">
                                    @if( $v->status == '1' )<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>
                                    @else <span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>
                                    @endif
                            </td>
                            <td class="td-manage">
                                @if( $v->status == '1' )<a style="text-decoration:none" onclick="member_stop(this,'{{ $v->id }}')" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>
                                @else                   <a style="text-decoration:none" onClick="member_start(this,'{{ $v->id }}')" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>
                                @endif
                                <a title="编辑" href="{{ url('admin/admin_user/'.$v->id.'/edit') }}"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="delUser(this,'{{ $v->id }}')"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                                <a href="">授权</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- 右侧内容框架，更改从这里结束 -->
                    <div class="layui-show">
                        {!! $data->render() !!}
                    </div>
                </div>
            </div>
            <!-- 右侧中部结束 -->
            </div>
        </div>
    </div>
    <script>

        //日期插件
        layui.use(['laydate'], function(){
            laydate = layui.laydate;
            //以上模块根据需要引入
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
                min: '2018-01-01 00:00:00'
                ,max: '2099-06-16 23:59:59'
                ,istoday: false
                ,choose: function(datas){
                    start.max = datas; //结束日选好后，重置开始日的最大日期
                }
            };

            document.getElementById('begin').onclick = function(){
                start.elem = this;
                laydate(start);
            }
            document.getElementById('over').onclick = function(){
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

        /*用户-查看*/
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }

        /*用户-停用*/
        function member_stop(obj,id){
            layer.confirm('确认要停用吗？',function(index){
                //发异步把用户状态进行更改
                $.post('{{ url('admin/admin_user_statu') }}',{'_token':"{{csrf_token()}}",'close':id},function (data) {
                    if(data.status == 0) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="layui-icon">&#xe62f;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-disabled layui-btn-mini">已停用</span>');
                        $(obj).remove();
                        layer.msg(data.message, {icon: 5, time: 1000});
                    }else{
//                        alert('停用失败');
                        layer.msg(data.message, {icon: 1, time: 1000});}
                });

            });
        }

        /*用户-启用*/
        function member_start(obj,id){
            layer.confirm('确认要启用吗？',function(index){
                //发异步把用户状态进行更改
                $.post('{{ url('admin/admin_user_statu') }}',{'_token':"{{csrf_token()}}",'close':id},function (data) {
                    if(data.status == 0) {
                        $(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(obj,id)" href="javascript:;" title="停用"><i class="layui-icon">&#xe601;</i></a>');
                        $(obj).parents("tr").find(".td-status").html('<span class="layui-btn layui-btn-normal layui-btn-mini">已启用</span>');
                        $(obj).remove();
                        layer.msg(data.message, {icon: 6, time: 1000});
                    }else{
//                        alert('启用失败');
                        layer.msg(data.message, {icon: 1, time: 1000});}
                });

            });
        }

        /*用户-删除*/
        function delUser(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $.post('{{ url('admin/admin_user/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                    if(data.status == 0) {
                        $(obj).parents("tr").remove();
                        layer.msg(data.message, {icon: 1, time: 1000});
                    }else{
                        layer.msg(data.message, {icon: 1, time: 1000});}
                });
            });
        }

//        //分页
//        layui.use('laypage', function(){
//            var laypage = layui.laypage;
//
//            //执行一个laypage实例
//            laypage.render({
//                cont: 'page'
//                ,pages: 100
//                ,skip: true
//            });
//        });
    </script>
@endsection