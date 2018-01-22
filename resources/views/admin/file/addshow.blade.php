@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/welcome')}}">首页</a> &raquo;
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>添加文件</h3>
        @if(count($errors)>0)
            <div class="mark">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                @else
                    <p>{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form action="{{url('admin/file/add')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden"  name="g_id" value="{{$g_id}}">
        <table class="add_tab">
            <tbody>
            <tr>
                <th><i class="require">*</i> 文件名称：</th>
                <td>
                    <input type="text" class="lg" name="file_title">
                </td>
            </tr>
            <tr>
                <th>选择文件：</th>
                <td>
                    <input type="file" class="lg" name="file_doc">
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回">
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
@endsection
