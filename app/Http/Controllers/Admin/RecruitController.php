<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Recruit;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class RecruitController extends Controller
{
    //
    public function index()
    {
            $data = Recruit::get();
            return view('admin.recruit.index', ['data' => $data]);

    }

    //招聘信息页面
    public function add()
    {
        return view('admin.recruit.add');
    }

    //添加招聘信息
    public function store()
    {
        //查询是否有公司信息

            $input = Input::except('_token');

            $input['createtime']    =time();
            $res = Recruit::create($input);
            if($res){
                return redirect('admin/recruit/index');
            }else{
                return back()->with('errors','公司信息存储失败');
            }

    }


    //删除招聘信息
    public function del($id)
    {
        $re = DB::table('recruit')->where('recruit_id','=',$id)->delete();
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
