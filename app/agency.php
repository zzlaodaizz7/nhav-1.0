<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class agency extends Model
{
    //
    protected $table='agency';
    protected $fillable = ['nameagency','phone','address','accountnumber'];
}
