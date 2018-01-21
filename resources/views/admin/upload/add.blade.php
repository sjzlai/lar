<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="{{asset('style/css/upload.css')}}">
		<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>
	</head>
	<body>
    <div style="text-align:center">商品图片上传</div>
		<div style="width: 100%;height: 100vh;position: relative;">
			<form id="upBox">
				{{csrf_field()}}
				<input type="hidden"  name="g_id" value="{{$gid}}">
				 <div id="inputBox"><input type="file" title="请选择图片" id="file" multiple accept="image/png,image/jpg,image/gif,image/JPEG"/>点击选择图片</div>
			     <div id="imgBox"></div>
			     <a id="btn">上传</a>
			</form>
		</div>
		
		<script src="{{asset('style/js/uploadImg.js')}}" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			imgUpload({
				inputId:'file', //input框id
				imgBox:'imgBox', //图片容器id
				buttonId:'btn', //提交按钮id
				upUrl:'{{url('admin/upload/store')}}',  //提交地址
				data:'img',//参数名
				num:"5",//上传个数,
				g_id:'g_id',
			});
		</script>
		
	</body>
</html>
