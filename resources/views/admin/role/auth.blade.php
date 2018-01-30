@extends('admin.layout')
@section('title','权限添加')
@section('content')
    <!-- 右侧主体开始 -->
    <div class="page-content">
        <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <blockquote class="layui-elem-quote">
                <a href="{{url('admin/index')}}">后台首页</a>/
                <a href="">后台管理员</a>/
                <a href="">权限添加</a>
            </blockquote>

            <div>
                @if(session('msg'))
                    <h2>{{session('msg')}}</h2>
                @endif
            </div>
            <!-- 中部开始 -->
            <div class="wrapper">
                <!-- 右侧主体开始 -->
                <div class="page-content">
                    <div class="content">
                        <!-- 右侧内容框架，更改从这里开始 -->
                        <form class="layui-form" action="{{url('admin/role/doauth')}}" method="post">
                            <table class="layui-table">
                            {{csrf_field()}}
                                <tr>
                                    <th>角色名：</th>
                                    <td>
                                        {{ $role->role_name }}
                                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                                    </td>
                                </tr>
                                <tr>
                                    <th>权限列表：</th>
                                    <td>
                                        @foreach($pers as $v)
                                            {{--如果当前遍历的角色在当前用户拥有的角色列表中，复选框应该加选中状态--}}
                                            @if(in_array($v->id,$own))
                                                <input type="checkbox" name="permission_id[]" checked title="{{ $v->permission_name }}" value="{{ $v->id }}">
                                            @else
                                                <input type="checkbox" name="permission_id[]" value="{{ $v->id }}" title="{{ $v->permission_name }}">
                                            @endif

                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                            <div class="layui-form-item">
                                <label for="L_repass" class="layui-form-label"></label>
                                <button  class="layui-btn" lay-filter="add" lay-submit="">增加</button>
                                {{--<button  class="layui-btn layui-btn-warm" lay-filter="back" onclick="history.go(-1)">返回</button>--}}
                            </div>
                        </form>
                        <!-- 右侧内容框架，更改从这里结束 -->
                    </div>
                </div>
                <!-- 右侧主体结束 -->
            </div>
            <!-- 中部结束 -->
        </div>
    </div>
    <!-- 右侧主体结束 -->
@endsection