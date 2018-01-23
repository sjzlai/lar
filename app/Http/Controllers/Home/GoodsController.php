<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\File;
use App\Http\Model\Goods;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Class GoodsController
 * @package App\Http\Controllers\Home
 * @name 商品api类
 * @author weikai
 */
class GoodsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     * @name 商品首页介绍信息
     * @author weikai
     */
    public function goodsIntroduction(){
        $goodsInfo = Goods::from('goods as g')
            ->leftJoin('goods_photo as p','p.gp_id','=','g.g_id')
            ->leftJoin('number as n','n_id','=','g.g_id')
            ->leftJoin('goods_cate as c','c.gc_id','=','g.gc_id')
            ->get();
        if($goodsInfo){
            return show(1,'首页产品介绍',$goodsInfo);
        }else{
            return show(0,'没有数据');
        }
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @name 产品名称列表
     * @author weikai
     */
    public function goodsList(){
        $goodsList = Goods::select('g_name','g_id')->get();
        if($goodsList){
            return show(1,'产品中心页 列表',$goodsList);
        }else{
            return show(0,'没有数据');
        }
    }

    /**
     * @param $g_id
     * @return \Illuminate\Http\JsonResponse
     * @name    产品中心详情
     * @author weikai
     */
    public function goodsInfo($g_id){
         $goodsInfo['info'] = Goods::from('goods as g')
             ->leftJoin('number as n','n_id','=','g.g_id')
             ->leftJoin('goods_cate as c','c.gc_id','=','g.gc_id')
             ->where('g.g_id',$g_id)
             ->get();
         //查询商品文件信息
         $goodsInfo['files'] = File::where('g_id',$g_id)->get();
         //查询商品图片信息
        $goodsInfo['photo'] = DB::table('goods_photo')->where('g_id',$g_id)->get();
        if($goodsInfo){
            return show(1,'产品中心详情信息',$goodsInfo);
        }else{
            return show(0,'没有数据');
        }
    }

}//class end
