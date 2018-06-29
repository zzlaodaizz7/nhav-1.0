<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    //
    protected $table = "order";
    protected $fillable = ['agency_id','taxcode','dateship','totalmoney','paied','debt'];
    public function getname(){
    	return $this->belongsTo('App\agency','agency_id','id');
    }
}
