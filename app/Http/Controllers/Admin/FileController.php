<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Model\File;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class FileController extends Controller
{
    //上传文件列表
    public function index()
    {
        $data = File::get();
        return view('admin.file.index',['data'=>$data]);
    }


    //上传文件
    public function add()
    {
        $input = Input::except('_token','file_doc');
        $file = Input::file();
        $input['file_createtime'] = time();
        $filePath =[];  // 定义空数组用来存放文件路径
        foreach ($file as $key => $value) {
            // 判断图片上传中是否出错
            if (!$value->isValid()) {
                exit("上传图片出错，请重试！");
            }
            if(!empty($value)){//此处防止没有多文件上传的情况
               /* $originaName = $file->getClientOriginalName();  //获取文件原名
                $ext = $file->getClientMimeType();              //文件扩展名
                $type =$file->getClientMimeType();              //文件类型
                $realPath = $file->getRealPath();               //淋湿绝对路径
                $filename = date('Y-m-d-H--i-s').'-'.uniqid().'-'.$ext;
                $bool = Storage::disk('uploads')->put($filename,file_get_contents($realPath));
                var_dump($bool);*/
                $allowed_extensions = ["doc", "pdf"];
                if ($value->getClientOriginalExtension() && !in_array($value->getClientOriginalExtension(), $allowed_extensions)) {
                    exit('您只能上传doc、pdf格式的文件！');
                }
                $destinationPath = '/file/'.date('Y-m-d'); // public文件夹下面uploads/xxxx-xx-xx 建文件夹
                $extension = $value->getClientOriginalExtension();   // 上传文件后缀
                $filename = date('YmdHis').mt_rand(100,999).'.'.$extension; // 重命名
                $value->move(public_path().$destinationPath, $filename); // 保存图片
                $a = $destinationPath.$filename;
            }

        }
        $input['file_path'] = $a;
        $res = File::create($input);
        if($res){
             return redirect('admin/goods');
        }else{
             return back()->with('errors','失败请重新提交');
        }


    }

    //上传页面展示
    public function addshow($g_id)
    {
        return view('admin.file.addshow',['g_id'=>$g_id]);

    }

    //删除文件
    public function del()
    {

    }


}
