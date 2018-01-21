@extends('layouts.admin')
@section('content')
        <!--面包屑导航 开始-->
<div class="crumb_warp">
    <i class="fa fa-home"></i> <a href="{{url('admin/welcome')}}">首页</a> &raquo; 分类管理
</div>
<!--面包屑导航 结束-->
<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">

        <h3>添加分类</h3>
      @if(count($errors)==0)
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
{{--        @if (count($errors) == 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif--}}
    </div>

</div>
        <form  action="{{url('admin/gcate')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">

                <tbody>
                <tr>
                    <th width="120"><i class="require">*</i>父级分类：</th>
                    <td>
                        <select name="gc_pid">
                            <option value="0">==顶级分类==</option>
                            @foreach($data as $d)
                                <option value="{{$d->gc_id}}">{{$d->gc_title}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>分类名称：</th>
                    <td>
                        <input type="text" name="gc_title">
                        <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>排序：</th>
                    <td>
                        <input type="text" class="sm" name="gc_order">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>是否显示：</th>
                    <td>
                        <input type="radio"   name="gc_status" value="0">显示
                        <input type="radio"  class="sm" name="gc_status" value="1">不显示

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
@endsection