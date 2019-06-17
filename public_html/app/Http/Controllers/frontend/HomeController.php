<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AccessoriesModel;
use App\Cateloaimodel;

class HomeController extends Controller
{
    public function gethomelinhkien(Request $request){
        $banner  = AccessoriesModel::select('id','accessories_name','origin','amount','input_unit_price','sale_unit_price','description','status','image','cate_accessories_id')->get()->sortByDesc('id')->take(3);
    	$data=Cateloaimodel::select('id','cate_name','parent_id')->get();
    	$AccessoriesModel=AccessoriesModel::select('id','accessories_name','origin','amount','input_unit_price','sale_unit_price','description','status','image','cate_accessories_id')->where('amount','>',0)->paginate(4);
    	//dd($AccessoriesModel);
        //dd($AccessoriesModel);
		return view('frontend.dashboard.index')->with('linhkien', $AccessoriesModel)->with('datacate', $data)->with('banner', $banner);
        /*$rs = array(
            'post' => !empty($AccessoriesModel) ? ($AccessoriesModel) : '',
            'comments' => !empty($data) ? ($data) : array(),
        );
        return ['data'=>$rs];*/
    }
    

    public function getmenu($id){
        $AccessoriesModel=AccessoriesModel::select('id','accessories_name','origin','amount','input_unit_price','sale_unit_price','description','status','image','cate_accessories_id')->where('cate_accessories_id',$id)->where('amount','>',0)->paginate(20);

        $banner  = AccessoriesModel::select('id','accessories_name','origin','amount','input_unit_price','sale_unit_price','description','status','image','cate_accessories_id')->get()->sortByDesc('id')->take(3);
        $data=Cateloaimodel::select('id','cate_name','parent_id')->get();

        return view('frontend.dashboard.index')->with('linhkien', $AccessoriesModel)->with('datacate', $data)->with('banner', $banner);


    }

    public function getsearch(Request $request){

        $banner  = AccessoriesModel::select('id','accessories_name','origin','amount','input_unit_price','sale_unit_price','description','status','image','cate_accessories_id')->get()->sortByDesc('id')->take(3);
        $data=Cateloaimodel::select('id','cate_name','parent_id')->get();
        $searchsp=AccessoriesModel::where('accessories_name','LIKE','%'.$request->txtsearch.'%')->where('amount','>',0)
                                    ->orwhere('sale_unit_price','LIKE','%'.$request->txtsearch.'%')->get();

         return view('frontend.search.search')->with('linhkien', $searchsp)->with('datacate', $data)->with('banner', $banner);                        

    }

}
