@extends('admin.layout')
@section('title','权限列表')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            {{--面包屑导航--}}
            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">权限管理</a>/
                <a href="">权限列表</a>
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
                        @foreach($per as $k=>$v)
                        <tr>
                            <td><input type="checkbox" class="mybox" value="1" name=""></td>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->permission_name }}</td>
                            <td>{{ $v->permission_des }}</td>
                            <td class="td-manage">
                                <a title="编辑" href="{{ url('admin/permission/'.$v->id.'/edit') }}"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="delUser(this,'{{ $v->id }}')"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
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
        function member_show(title,url,id,w,h){
            x_admin_show(title,url,w,h);
        }

        /*用户-删除*/
        function delUser(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $.post('{{ url('admin/permission/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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