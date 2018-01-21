<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Model\gcate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class GcateController extends CommonCotroller
{
    //get.admin/gcate       全部分类列表
    public function index(){
        $data =(new Gcate)->tree();
        return view('admin.gcate.index')->with('data',$data);
    }


    //get.admin/gcate/create     添加分类
    public function create(){

        $data = Gcate::where('gc_pid',0)->get();
        return view('admin/gcate/add')->with('data',$data);
    }

    //post.admin/gcate     添加分类提交
    public function store(){

        $input = Input::except('_token');
        $input['gc_createtime'] =time();
        //dd($input);
        $rules = [
            'gc_title'=>'required',
        ];

        $message = [
            'gc_title.required'=>'分类名称不能为空！',
        ];

        $validator = Validator::make($input,$rules,$message);
        //dd($validator);
        if($validator->passes()){
            $re = Gcate::create($input);
//            dd($re);
            if($re){
                return redirect('admin/gcate');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }

    //get.admin/category/{category}/edit       编辑分类
    public function edit($cate_id){
        $field = Gcate::find($cate_id);
        $data = Gcate::where('gc_pid',0)->get();
        return view('admin.gcate.edit',compact('field','data'));
    }


    //put.admin/gcate/{gcate}         更新分类
    public function update($gc_id){
        $input =Input::except('_token','_method');
        $re =Gcate::where('gc_id',$gc_id)->update($input);
        if($re){
            return redirect('admin/gcate');
        }else{
            return back()->with('errors','更新失败请重新提交');
        }
    }

    //delete .admin/gcate/{gcate}     删除单个分类
    public function destroy($gc_id){
        //dd($gc_id);
        $re = Gcate::where('gc_id',$gc_id)->delete();
        Gcate::where('gc_pid',$gc_id)->update(['gc_pid'=>0]);
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
