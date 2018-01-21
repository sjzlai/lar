@extends('layouts.admin')
@section('content')
        <div class="x-body">
            <blockquote class="layui-elem-quote">欢迎进入后台！</blockquote>
            <fieldset class="layui-elem-field">
              <legend>信息统计</legend>
              <div class="layui-field-box">
               {{-- <table class="layui-table" lay-even>
                    <thead>
                        <tr>
                            <th>统计</th>
                            <th>资讯库</th>
                            <th>图片库</th>
                            <th>产品库</th>
                            <th>用户</th>
                            <th>管理员</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>总数</td>
                            <td>92</td>
                            <td>9</td>
                            <td>0</td>
                            <td>8</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td>今日</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>昨日</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>本周</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr>
                            <td>本月</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                    </tbody>
                </table>--}}
                <table class="layui-table">
                <thead>
                    <tr>
                        <th colspan="2" scope="col">服务器信息</th>
                    </tr>
                </thead>
                <tbody>
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
                        <td>服务器操作系统 </td>
                        <td>{{PHP_OS}}</td>
                    </tr>
                    <tr>
                        <td>上传附件限制 </td>
                        <td><?php echo  get_cfg_var('upload_max_filesize')?get_cfg_var("upload_max_filesize"):"不允许上传附件";?></td>
                    </tr>
                    <tr>
                        <td>服务器的语言种类 </td>
                        <td>{{$_SERVER['HTTP_ACCEPT_LANGUAGE']}}</td>
                    </tr>
                    <tr>
                        <td>当前时间 </td>
                        <td><?php echo date('Y年m月d日 H时i分s秒')?></td>
                    </tr>
                    <tr>
                        <td>当前SessionID </td>
                        <td>gznhpwmp34004345jz2q3l45</td>
                    </tr>
                    <tr>
                        <td>当前系统用户名 </td>
                        <td>NETWORK SERVICE</td>
                    </tr>
                </tbody>
            </table>
              </div>
            </fieldset>
            <blockquote class="layui-elem-quote layui-quote-nm">感谢layui,百度Echarts,jquery,本后台系统由X前端框架提供前端技术支持。</blockquote>
            
        </div>
        <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
        </script>
@endsection