{{--@extends('layouts.admin')
@section('content')--}}
    <div class="result_wrap">
        @if(count($errors)>0)
            <div style="margin: 10px">
                @if(is_object($errors))
                    @foreach($errors->all() as $error)
                        <p style="background: red; font-size: 18px">{{$error}}</p>
                    @endforeach
                @else
                    <p style="font-size: 18px;background:green;">{{$errors}}</p>
                @endif
            </div>
        @endif
    </div>
    <form method="post" action="">
        {{csrf_field()}}
        <table  class="layui-table">
            <tbody>
            <tr>
                <th width="120"><i class="require">*</i>原密码：</th>
                <td>
                    <input type="password" name="password_o"> </i>请输入原始密码</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>新密码：</th>
                <td>
                    <input type="password" name="password"> </i>新密码6-20位</span>
                </td>
            </tr>
            <tr>
                <th><i class="require">*</i>确认密码:</th>
                <td>
                    <input type="password" name="password_confirmation"> </i>再次输入密码</span>
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
