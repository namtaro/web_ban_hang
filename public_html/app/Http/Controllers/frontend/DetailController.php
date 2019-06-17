<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AccessoriesModel;

class DetailController extends Controller
{
    public function getdetaillinhkien($id){
    	
    	    $AccessoriesModel=AccessoriesModel::select('id','accessories_name','origin','amount','input_unit_price','sale_unit_price','description','status','image','cate_accessories_id')->where('id',$id)->get();
    	            return view('frontend.listhang.listhang')->with('linhkien', $AccessoriesModel);


    }
}
