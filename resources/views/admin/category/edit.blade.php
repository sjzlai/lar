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
        <form  action="{{url('admin/category/'.$field->cate_id)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{csrf_field()}}
            <table class="add_tab">

                <tbody>
                <tr>
                    <th width="120"><i class="require">*</i>父级分类：</th>
                    <td>
                        <select name="cate_pid">
                            <option value="0">==顶级分类==</option>
                            @foreach($data as $d)
                                <option value="{{$d->gc_id}}"
                                @if($d->gc_id ==$field->gc_pid)selected @endif>
                                    {{$d->gc_title}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>分类名称：</th>
                    <td>
                        <input type="text" name="cate_name" value="{{$field->cate_name}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>分类名称必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th>分类标题：</th>
                    <td>
                        <input type="text" class="lg" name="cate_title" value="{{$field->cate_title}}">
                    </td>
                </tr>
                <tr>
                    <th>关键词：</th>
                    <td>
                        <textarea name="cate_keywords">{{$field->cate_keywords}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td>
                        <textarea name="cate_description">{{$field->cate_description}}</textarea>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>排序：</th>
                    <td>
                        <input type="text" class="sm" name="cate_order" value="{{$field->cate_order}}">
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