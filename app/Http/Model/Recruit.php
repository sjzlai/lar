<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Recruit extends Model
{
    //
    protected $table = 'recruit';
    protected $primaryKey = 'recruit_id';
    public $timestamps =false;
    protected $guarded =[];
}
