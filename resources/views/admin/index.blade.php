@extends('admin.layout')
@section('title','后台首页')
@section('content')

        <!-- 右侧主体开始 -->
        <div class="page-content">
          <div class="content">
            <!-- 右侧内容框架，更改从这里开始 -->
            <fieldset class="layui-elem-field layui-field-title site-title">
              <legend><a name="default">信息统计</a></legend>
            </fieldset>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th>统计</th>
                        <th>用户库</th>
                        <th>商品库</th>
                        <th>广告库</th>
                        <th>订单库</th>
                        <th>评论库</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>总数</td>
                        <td>{{$allData}}</td>
                        <td>{{$goods}}</td>
                        <td>{{$rotation}}</td>
                        <td>{{$orders}}</td>
                        <td>{{$comment}}</td>
                    </tr>

                </tbody>
            </table>
            <table class="layui-table">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">服务器信息</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th width="30%">服务器计算机名</th>
                        <td><span id="lbServerName">{{$_SERVER['HTTP_HOST']}}</span></td>
                    </tr>
                    <tr>
                        <td>服务器IP地址</td>
                        <td>{{$_SERVER['SERVER_ADDR']}}</td>
                    </tr>
                    <tr>
                        <td>服务器域名</td>
                        <td>{{$_SERVER['SERVER_NAME']}}</td>
                    </tr>
                    <tr>
                        <td>服务器端口 </td>
                        <td>{{$_SERVER['SERVER_PORT']}}</td>
                    </tr>
                    <tr>
                        <td>运行环境 </td>
                        <td>{{$_SERVER['SERVER_SOFTWARE']}}</td>
                    </tr>
                    <tr>
                        <td>本文件所在文件夹 </td>
                        <td>{{$_SERVER['DOCUMENT_ROOT']}}</td>
                    </tr>
                    <tr>
                        <td>服务器操作系统 </td>
                        <td>{{$_SERVER['SERVER_SIGNATURE']}}</td>
                    </tr>
                    <tr>
                        <td>系统所在文件夹 </td>
                        <td>{{$_SERVER['CONTEXT_DOCUMENT_ROOT']}}</td>
                    </tr>
                    <tr>
                        <td>上传附件限制</td>
                        <td><?php echo get_cfg_var("upload_max_filesize")?get_cfg_var("upload_max_filesize"):"不允许上传附件"; ?></td>
                    </tr>
                    <tr>
                        <td>邮箱名称</td>
                        <td>{{$_SERVER['MAIL_USERNAME']}}</td>
                    </tr>
                    <tr>
                        <td>数据库名字 </td>
                        <td>{{$_SERVER['DB_DATABASE']}}</td>
                    </tr>
                    <tr>
                        <td>服务器当前时间 </td>
                        <td>{{ date('Y-m-d H:i:s') }}</td>
                    </tr>
                    <tr>
                        <td>连接的数据库</td>
                        <td>{{ $_SERVER['DB_CONNECTION']}}</td>
                    </tr>
                </tbody>
            </table>
            <!-- 右侧内容框架，更改从这里结束 -->
          </div>
        </div>
        <!-- 右侧主体结束 -->

 @endsection