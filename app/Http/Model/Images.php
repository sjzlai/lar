<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'goods_photo';
    protected $primaryKey='gp_id';
    public $timestamps =false;
    protected $guarded =[];

}
