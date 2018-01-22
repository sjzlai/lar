<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $table = 'file';
    protected $primaryKey='file_id';
    public $timestamps =false;
    protected $guarded =[];
}
