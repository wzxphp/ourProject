@extends('admin.layout')
@section('title','角色列表')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            {{--面包屑导航--}}
            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">角色管理</a>/
                <a href="">角色列表</a>
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
                    <div style="width: 900px;"></div>
                    <table id="tid" class="layui-table">
                        <thead>
                        <tr>
                            <th><input type="checkbox" onclick="checkBox($(this));" name="" value=""></th>
                            <th> ID </th>
                            <th> 权限名称 </th>
                            <th> 权限描述 </th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($role as $k=>$v)
                        <tr>
                            <td><input type="checkbox" class="mybox" value="1" name=""></td>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->role_name }}</td>
                            <td>{{ $v->role_description }}</td>
                            <td class="td-manage">
                                <a title="编辑" href="{{ url('admin/role/'.$v->id.'/edit') }}"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="delUser(this,'{{ $v->id }}')"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                                <a title="授权" href="{{ url('admin/role/auth/'.$v->id) }}"><i class="layui-icon">&#xe62e;</i></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- 右侧内容框架，更改从这里结束 -->
                    {{--<div class="layui-show">--}}
                        {{--{!! $data->render() !!}--}}
                    {{--</div>--}}
                </div>
            </div>
            <!-- 右侧中部结束 -->
            </div>
        </div>
    </div>
    <script>

        layui.use('table', function(){
            var table = layui.table;
            //第一个实例
            table.render({
                elem: '#tid'
                ,height: 315
//                ,url: '/demo/table/user/' //数据接口
                ,page: true //开启分页
                ,cols: [[ //表头
                    {field: 'id', title: 'ID', width:80, sort: true, fixed: 'left'}
                    ,{field: 'username', title: '用户名', width:80}
                    ,{field: 'sex', title: '性别', width:80, sort: true}
                    ,{field: 'city', title: '城市', width:80}
                    ,{field: 'sign', title: '签名', width: 177}
                    ,{field: 'experience', title: '积分', width: 80, sort: true}
                    ,{field: 'score', title: '评分', width: 80, sort: true}
                    ,{field: 'classify', title: '职业', width: 80}
                    ,{field: 'wealth', title: '财富', width: 135, sort: true}
                ]]
            });

        });


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

        /*用户-删除*/
        function delUser(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $.post('{{ url('admin/role/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                    if(data.status == 0) {
                        $(obj).parents("tr").remove();
                        layer.msg(data.message, {icon: 1, time: 1000});
                    }else{
                        layer.msg(data.message, {icon: 1, time: 1000});}
                });
            });
        }

    </script>
@endsection