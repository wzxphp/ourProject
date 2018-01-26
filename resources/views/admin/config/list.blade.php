@extends('admin.layout')
@section('title','网站配置')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            {{--面包屑导航--}}
            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">网站配置</a>/
                <a href="">配置信息列表</a>
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
                    <!-- 右侧内容框架，更改从这里开始 -->
                    <xblock>
                            <button id="addbtn" class="layui-btn"><i class="layui-icon">&#xe608;</i><a href="{{ url('admin/config/create') }}">添加</a></button>
                    </xblock>
                    <form action="{{ url('admin/config/changecontent') }}" method="post">
                        <table id="tid" class="layui-table" lay-data="{field:'amount', width:120}">
                        <thead>
                        {{csrf_field()}}
                        <tr>
                            <th> 排序</th>
                            <th> ID </th>
                            <th> 标题 </th>
                            <th> 名称 </th>
                            <th> 内容 </th>
                            <th> 操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $k=>$v)
                        <tr>
                            <td><input class="layui-input" style="width: 50px;" type="text" onchange="changeOrder(this,{{ $v->conf_id }})" value="{{ $v->conf_order }}"></td>
                            <td>{{ $v->conf_id }}</td>
                            <td>{{ $v->conf_title }}</td>
                            <td>{{ $v->conf_name }}</td>
                            <td>
                                <input class="layui-input" type="hidden" name="conf_id[]" value="{{ $v->conf_id }}">
                                {!! $v->conf_contents !!}
{{--                                {{ $v->conf_contents }}--}}
                            </td>
                            <td class="td-manage">
                                <a title="编辑" href="{{ url('admin/config/'.$v->conf_id.'/edit') }}"
                                   class="ml-5" style="text-decoration:none">
                                    <i class="layui-icon">&#xe642;</i>
                                </a>
                                <a title="删除" href="javascript:;" onclick="delUser(this,'{{ $v->conf_id }}')"
                                   style="text-decoration:none">
                                    <i class="layui-icon">&#xe640;</i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                        <button class="layui-btn layui-btn-normal" key="set-mine" lay-filter="save" lay-submit>保存</button>
                    </form>
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

        /*用户-删除*/
        function delUser(obj,id){
            layer.confirm('确认要删除吗？',function(index){
                //发异步删除数据
                $.post('{{ url('admin/config/') }}/'+id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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