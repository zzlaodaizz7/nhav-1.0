<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detailorder extends Model
{
    //
    protected $table = "detailorder";
    protected $fillable = ['order_id','product_id','count','totalmoney'];
}
