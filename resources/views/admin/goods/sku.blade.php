@extends('layouts.admin')
@section('content')
<div style="margin: 50px;">
        <ul class="SKU_TYPE" style="display:none">
            <li is_required='0' propid='1' sku-type-name="存储"><em>*</em>存储：</li>
        </ul>
        <ul style="display:none">
            <li><label><input type="checkbox" class="sku_value" propvalid='11' value="16G"/>16G</label></li>
        </ul>
        <div class="clear"></div>
        <div class="clear"></div>
        <button class="cloneSku back">添加自定义sku属性</button>
    <input type='button' class='' onclick='history.go(-1)' value='返回'>
        <!--sku模板,用于克隆,生成自定义sku-->
        <div id="skuCloneModel" style="display: none;">
            <div class="clear"></div>
            <ul class="SKU_TYPE">
                <li is_required='0' propid='' sku-type-name="">
                    <a href="javascript:void(0);" class="delCusSkuType">移除</a>
                    <input type="text" class="cusSkuTypeInput" />：
                </li>
            </ul>
            <ul>
                <li>
                    <input type="checkbox" class="model_sku_val" propvalid='' value=""/>
                    <input type="text" class="cusSkuValInput" />
                </li>
                <button class="cloneSkuVal">添加自定义属性值</button>
            </ul>
            <div class="clear"></div>
        </div>
        <!--单个sku值克隆模板-->
        <li style="display: none;" id="onlySkuValCloneModel">
            <input type="checkbox" class="model_sku_val" propvalid='' value=""/>
            <input type="text" class="cusSkuValInput"/>
            <a href="javascript:void(0);" class="delCusSkuVal">删除</a>
        </li>
        <div class="clear"></div>
        <div >
            <form action="{{url('admin/goods/skuadd')}}"  method='post'>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="g_id" value="{{$g_id}}">
                <div  id="skuTable">

                </div>
            </form>
        </div>
        <link rel="stylesheet" href="{{asset('style/css/sku_style.css')}}"/>
        <script type="text/javascript" src="{{asset('style/js/getSetSkuVals.js')}}"></script>
        <script type="text/javascript" src="{{asset('style/js/createSkuTable.js')}}"></script>
        <script type="text/javascript" src="{{asset('style/js/customSku.js')}}"></script>
        {{--<script type="text/javascript" src="{{asset('style/plugins/layer/layer.js')}}"></script>--}}
</div>
<script>

</script>
@endsection