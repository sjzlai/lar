<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonCotroller
{
    //get.admin/Article        全部文章列表
      public function index(){
         $data = Article::orderBy('art_id','desc')->paginate(2);
        return view('admin.article.index',['data'=>$data]);
        }


        //get.admin/Article/create     添加文章
    public function create(){
        $data =(new Category)->tree();
       return view('admin.article.add',['data'=>$data]);
    }

    //post.admin/Article       添加文章提交
    public function store(){
        $input = Input::except('_token','file_upload');
        $file = Input::file('file_upload');
        if($file->isValid()){
            $originalName = $file->getClientOriginalName(); // 文件原名
            $ext = $file->getClientOriginalExtension();     // 扩展名
            $realPath = $file->getRealPath();   //临时文件的绝对路径
            $type = $file->getClientMimeType();     // image/jpeg
            // 上传文件
            $filename = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
            // 使用我们新建的uploads本地存储空间（目录）
            $bool = Storage::disk('uploads')->put($filename, file_get_contents($realPath));
            $filepath = '/storage/app/uploads/'.$filename;
            $input['art_thumb'] =$filepath;
        }
        $rules = [
            'art_title'=>'required',
            'art_thumb'=>'required',
        ];

        $message = [
            'art_title.required'=>'分类名称不能为空！',
            'art_thumb.required'=>'缩略图不能为空！',
        ];
        //文章添加时间
        $input['art_time']  =   time();
        $validator = Validator::make($input,$rules,$message);
        //dd($validator);
        if($validator->passes()){
            $re = Article::create($input);
            if($re){
                return redirect('admin/article');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }



    //delete .admin/article/{article}     删除单个分类
    public function destroy($cate_id){
        $re = Article::where('art_id',$cate_id)->delete();
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
