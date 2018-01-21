@extends('layouts.admin')
@section('content')
{{--    <div class="x-body">
      <div class="layui-row">
        <form class="layui-form layui-col-md12 x-so">
          <input class="layui-input" placeholder="开始日" name="start" id="start">
          <input class="layui-input" placeholder="截止日" name="end" id="end">
          <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
          <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
        </form>
      </div>--}}
      <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
        {{--<button class="layui-btn" onclick="x_admin_show('添加用户','{{url('admin/category/create')}}')"><i class="layui-icon"></i>添加</button>--}}
          <a href="{{url('admin/gcate/create')}}" i class="layui-btn layui-icon">添加</a>
        <span class="x-right" style="line-height:40px;">&nbsp;&nbsp;&nbsp;&nbsp;<a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" href="javascript:location.replace(location.href);" title="刷新">
                <i class="layui-icon" style="line-height:30px">ဂ</i></a></span>

      </xblock>
      <table class="layui-table">
        <thead>
          <tr>
            <th>
              <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>排序</th>
            <th>ID</th>
            <th>分类名称</th>
            <th>操作</th>
        </thead>
        <tbody>
        @foreach($data as $v)
          <tr>
            <td>
              <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
            </td>
            <td ><input type="text" style="width: 25px;" onchange="changeOrder(this,{{$v->gc_id}})" name="ord[]" value="{{$v->gc_order}}"></td>
            <td>{{$v->gc_id}}</td>
            <td>{{$v->gc_title}}</td>
            <td class="td-manage">
             {{-- <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用">
                <i class="layui-icon">&#xe601;</i>
              </a>--}}
              <a title="编辑" href="{{url('admin/gcate/'.$v->gc_id.'/edit ')}}">
                <i class="layui-icon">&#xe642;</i>
              </a>
                &nbsp;&nbsp;&nbsp;
              <a title="删除"  href="javascript:;" onclick="member_del({{$v->gc_id}});">
                <i class="layui-icon">&#xe640;</i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="page">
        <div>
          <a class="prev" href="">&lt;&lt;</a>
          <a class="num" href="">1</a>
          <span class="current">2</span>
          <a class="num" href="">3</a>
          <a class="num" href="">489</a>
          <a class="next" href="">&gt;&gt;</a>
        </div>
      </div>

    </div>
    <script>
      layui.use('laydate', function(){
        var laydate = layui.laydate;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post("{{url('admin/gcate/')}}/"+obj,{'_method':'delete','_token':"{{csrf_token()}}"},function(data){
                  if (data.status ==0){
                      location.href=location.href;
                      layer.msg(data.msg,{icon:6})
                  }else{
                      layer.msg(data.msg,{icon:5})
                  }
              });
              //$(obj).parents("tr").remove();
              layer.msg('已删除!',{icon:1,time:1000});
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();
    </script>
    <script>
      function changeOrder(obj,cate_id){
          var cate_order = $(obj).val();
        $.post("{{url('admin/cate/changeorder')}}",{'_token':'{{csrf_token()}}',cate_id:cate_id,cate_order:cate_order},function(data){

            if(data.status ==0){
                layer.msg(data.msg, {icon: 6});
            }else{
                layer.msg(data.msg, {icon: 5});
            }
        });
      }
    </script>
@endsection