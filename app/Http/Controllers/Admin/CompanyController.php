<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CompanyController extends Controller
{
    //
    /**
     * name 公司介绍添加展示
     */
    public function add(){
        $data =Company::get();
        if(empty($data))
        {
            return back()->with('公司信息已存在,请前往修改页面');
        }else {
            return view('admin.company.add');
        }
    }

    /**
     * name 公司介绍展示
     */
    public function index(){
        $data =Company::get();
        return view('admin.company.index',['data'=>$data]);
    }


    public function store(){
        //查询是否有公司信息
            $input = Input::except('_token');
        //dd($input);
            $input['createtime']    =time();
            $res = Company::create($input);
            if($res){
                return redirect('admin/company/index');
            }else{
                return back()->with('errors','公司信息存储失败');
            }

    }

    //删除公司信息
    public function del($id)
    {
        $re = DB::table('company')->where('company_id','=',$id)->delete();
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
