<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Gcate;
use App\Http\Model\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class GoodsController extends CommonCotroller
{
    //get.admin/goods        全部商品列表
    public function index(){

        //$data = Goods::orderBy('g_id','desc')->paginate(2);
       $data = DB::table('goods')
            ->join('goods_cate','goods.gc_id','=','goods_cate.gc_id')
            //->join('goods_sku','goods.g_id','=','goods_sku.g_id')
           ->paginate(2);
        $info =DB::table('goods_sku')->get();
        //var_dump($info);
        return view('admin.goods.index',['data'=>$data,'info'=>$info]);
    }

    //post.admin/goods        添加商品
    public function create(){
        $data = (new Gcate)->tree();
        //dd($data);
        return view('admin.goods.add',['data'=>$data]);
    }

    //post.admin/Goods       添加商品提交
    public function store(){
        $input = Input::except('_token','file_upload');
        /*$file = Input::file('file_upload');
        */
        $rules = [
            'g_name'=>'required',
//            'g_photo'=>'required',
        ];

        $message = [
            'g_name.required'=>'分类名称不能为空！',
//            'g_photo.required'=>'缩略图不能为空！',
        ];
        //文章添加时间
        $input['g_createtime']  =   time();
        $validator = Validator::make($input,$rules,$message);
        //dd($validator);
        if($validator->passes()){

            $re = Goods::create($input);
            if($re){
                return redirect('admin/goods');
            }else{
                return back()->with('errors','数据填充失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($validator);
        }
    }


    //get.admin/goods/{goods}/edit       编辑商品
    public function edit($g_id){
        $data = Goods::find($g_id);
        $field =DB::table('goods')
            ->join('goods_cate','goods.gc_id','=','goods_cate.gc_id')
            ->get();
        return view('admin.goods.edit',compact('field','data'));
    }

    //get.admin/goods/{goods}     显示单个分类信息
    public function show(){

    }


    //put.admin/goods/{goods}         更新商品
    public function update($g_id){
        $input =Input::except('_token','_method');
        $re =Goods::where('g_id',$g_id)->update($input);
        if($re){
            return redirect('admin/goods');
        }else{
            return back()->with('errors','更新失败请重新提交');
        }
    }

    //delete .admin/goods/{goods}     删除单个商品
    public function destroy($g_id){
        $re = Goods::where('g_id',$g_id)->delete();
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



    //设置sku值
    public function sku($g_id){
        return view('admin.goods.sku',['g_id'=>$g_id]);
    }
    //提交SKU
    public function skuadd(){
        $data = Input::except('_token','g_id');
        $g_id =Input::only('g_id');
//dd($data);
        for($i=0;$i<count($data['num']);$i++){
            $res= DB::table('goods_sku')->insert(array('sku_num'=>$data['num'][$i],'sku_depot'=>$data['depot'][$i],'sku_price'=>$data['price'][$i],'g_id'=>$g_id['g_id']));
        }
        if($res){
            return redirect('admin/goods');
        }

    }

    //delete .admin/goods/{goods}     删除单个商品
    public function skudel($sku_id){
        $re = DB::table('goods_sku')->where('sku_id',$sku_id)->delete();
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
