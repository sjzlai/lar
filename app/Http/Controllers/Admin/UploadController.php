<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

class UploadController extends CommonCotroller
{
    //get.admin/Upload        全部图片列表
    public function index()
    {
        $data =DB::table('goods_photo')->get();
        return  view('admin.upload.index',['data'=>$data]);
    }
    //post.admin/Upload       添加图片提交
    public function store(Request $request)
    {

        $input =Input::except('_token','img');
        $info =DB::table('goods_photo')->where('g_id','=',$input['g_id'])->get();
        if(count($info)>=5){
            exit("商品图片已存在,可修改");
        }
        $file = $request->file('img');
        $filePath =[];  // 定义空数组用来存放图片路径
        foreach ($file as $key => $value) {
            // 判断图片上传中是否出错
            if (!$value->isValid()) {
                exit("上传图片出错，请重试！");
            }
            if(!empty($value)){//此处防止没有多文件上传的情况
                $allowed_extensions = ["png", "jpg", "gif"];
                if ($value->getClientOriginalExtension() && !in_array($value->getClientOriginalExtension(), $allowed_extensions)) {
                    exit('您只能上传PNG、JPG或GIF格式的图片！');
                }
                $destinationPath = '/uploads/'.date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $fileName = date('YmdHis').mt_rand(100,999).'.'.$extension; // 重命名
                $value->move(public_path().$destinationPath, $fileName); // 保存图片
                $img =Image::make('uploads/'.date('Y-m-d').'/'.$fileName)->resize(200,200);
                $img->save('uploads/2018-01-18/'.'small_'.$fileName);
                Image::make('uploads/'.date('Y-m-d').'/'.$fileName)->resize(600,600)->save('uploads/2018-01-18/'.'thum_'.$fileName);
                for($i=0;$i<count($file);$i++){
                    $filePath[$i]['g_photo']= 'uploads/'.date('Y-m-d').'/'.$fileName;
                    $filePath[$i]['g_small']='uploads/2018-01-18/'.'small_'.$fileName;
                    $filePath[$i]['g_big']='uploads/2018-01-18/'.'thum_'.$fileName;
                }

            }
        }
        // 制作缩略图,将数据存入到表中
        //var_dump($filePath);die;
        $input['gp_createtime']=time();
        for($a=0;$a<count($filePath);$a++){
            $input['gp_photo']=$filePath[$a]['g_photo'];
            $input['gp_thum']=$filePath[$a]['g_big'];
            $input['gp_small']=$filePath[$a]['g_small'];
           $res = DB::table('goods_photo')->insert($input);
        }
        if($res){
            return redirect('admin/goods');
        }else{
            return back()->with('errors','失败请重新提交');
        }

    }

    //添加图片页面
    public function add($gid){
        return view('admin.upload.add',['gid'=>$gid]);
    }

    public function del($g_id){
        $re = DB::table('goods_photo')->where('gp_id',$g_id)->delete();
        if($re){
            $data =[
                'status' =>0,
                'msg'   =>'删除成功',
            ];
        }else{
            $data =[
                'status' =>1,
                'msg'   =>'删除失败',
            ];
        }
        return $data;
    }

}
