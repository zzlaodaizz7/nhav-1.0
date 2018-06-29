<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\agency;
use App\order;
class ajax_controller extends Controller
{
    //
    public function loadagency($agency_id){
    	$data = agency::find($agency_id);
    	echo "<div class=\"form-group\">
	                <label class=\"col-sm-4 control-label\">Địa chỉ</label>
	                <div class=\"col-sm-8\">
	                    <input type=\"text\" value=\"$data->address\" class=\"form-control\">
	                </div>
	            </div>
	            <div class=\"hr-line-dashed\"></div>
	            <div class=\"form-group\">
	                <label class=\"col-sm-4 control-label\">Số tài khoản:</label>
	                <div class=\"col-sm-8\">
	                    <input type=\"text\" value=\"$data->accountnumber\" class=\"form-control\">
	                </div>
	            </div>";
    }
    public function loadagencystastitic($agency_id){
    	$totalmoney;
    	$totalpaied;
    	$totaldebt;
    	$totalm = order::select('totalmoney')->where('agency_id','=',$agency_id)->sum('totalmoney');
    	$totalp = order::select('paied')->where('agency_id','=',$agency_id)->sum('paied');
    	$totald = order::select('debt')->where('agency_id','=',$agency_id)->sum('debt');

    	for ($i=1; $i <12 ; $i++) { 
    		$totalmoney[$i] = order::select('totalmoney')->whereYear('created_at','=',2018)->whereMonth('created_at','=',$i)->where('agency_id','=',$agency_id)->sum('totalmoney');
    		$totalpaied[$i] = order::select('paied')->whereYear('created_at','=',2018)->whereMonth('created_at','=',$i)->where('agency_id','=',$agency_id)->sum('paied');
    		$totaldebt[$i] = order::select('debt')->whereYear('created_at','=',2018)->whereMonth('created_at','=',$i)->where('agency_id','=',$agency_id)->sum('debt');
    	}
    	$data[0] = $totalmoney;
    	$data[1] = $totalpaied;
    	$data[2] = $totaldebt;
    	$data[3] = $totalm;
    	$data[4] = $totalp;
    	$data[5] = $totald;
    	return json_encode($data);
    }

}
