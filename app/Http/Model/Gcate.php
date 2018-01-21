<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class gcate extends Model
{
    protected $table = 'goods_cate';
    protected $primaryKey='gc_id';
    public $timestamps =false;
    protected $guarded =[];

    public function tree(){
        $categorys = $this->orderBy('gc_order','asc')->get();
        return $this->getTree($categorys,'gc_title','gc_id','gc_pid');
    }

    public function getTree($data,$field_name,$field_id='id',$field_pid='pid',$pid=0){
        $arr =array();
        foreach($data as $k=>$v){
            if($v->$field_pid ==$pid){
                $data[$k]["_".$field_name] =$data[$k][$field_name];
                $arr[] =$data[$k];
                foreach($data as $m=>$n){
                    if($n->$field_pid == $v->$field_id){
                        $data[$m]["_gc_title"] ='━━━━'.$data[$m][$field_name];
                        $arr[] =$data[$m];
                    }
                }
            }
        }
        return $arr;
    }
}
