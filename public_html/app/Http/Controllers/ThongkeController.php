<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Bill_sale_Model;

class ThongkeController extends Controller
{
    public function getdhdagiao(){
    		$bill = DB::table('bill_sale')
            ->join('customer', 'bill_sale.customer_id', '=', 'customer.id')
            ->select('bill_sale.*', 'customer.cus_name', 'customer.email','customer.address')
            ->where('status',1)
            ->get();
            $getnameper = DB::table('bill_sale')
            ->join('personnel', 'bill_sale.personnel_id', '=', 'personnel.id')
            ->select('bill_sale.id',  'personnel.name')
            ->get();
            
    	return view('admin.thongke.dhdagiao',['bill'=>$bill],['getnameper'=>$getnameper]);

    }
    public function getdhchuaduyet(){
            $bill = DB::table('bill_sale')
            ->join('customer', 'bill_sale.customer_id', '=', 'customer.id')
            ->select('bill_sale.*', 'customer.cus_name', 'customer.email','customer.address')
            ->where('status',0)
            ->get();
            $getnameper = DB::table('bill_sale')
            ->join('personnel', 'bill_sale.personnel_id', '=', 'personnel.id')
            ->select('bill_sale.id',  'personnel.name')
            ->get();
            
        return view('admin.thongke.dhchuaduyet',['bill'=>$bill],['getnameper'=>$getnameper]);

    }
    public function getdoanhthu(Request $request){

        $nam=DB::table('bill_sale')->select('stayear')->distinct()->orderBy('stayear')->get();
        $thangnam=DB::table('bill_sale')->select('stamonth','stayear')->distinct()->get();
        $nam11=DB::table('bill_sale')->select('stamonth','stayear')->distinct()->get();
        $trung=Bill_sale_Model::select('total')->get()->unique('stamonth','stayear');


        $doanhthu = DB::table('detail_bill_sale')
            ->join('bill_sale', 'bill_sale.id', '=', 'detail_bill_sale.bill_sale_id')
            ->join('accessories', 'accessories.id', '=', 'detail_bill_sale.accessories_id')
            ->select('detail_bill_sale.*', 'bill_sale.total','bill_sale.stamonth','bill_sale.stayear','bill_sale.sale_date','accessories.accessories_name')
            ->where('bill_sale.status','1')
            ->get();
        //dd($doanhthu);
             $tongdoanhthu = DB::table('detail_bill_sale')
            ->join('bill_sale', 'bill_sale.id', '=', 'detail_bill_sale.bill_sale_id')
            ->join('accessories', 'accessories.id', '=', 'detail_bill_sale.accessories_id')
            ->select('detail_bill_sale.*', 'bill_sale.total','bill_sale.stamonth','bill_sale.stayear','bill_sale.sale_date','accessories.accessories_name')
            ->where('bill_sale.status','1')
            ->sum('total_money');

             
        
           
        return view('admin.thongke.doanhthu')->with('nam',$nam)->with('doanhthu',$doanhthu)->with('tongdoanhthu',$tongdoanhthu);
    }
    public function postdoanhthu(Request $request){

            $thang=$request->txtslthang;
            $nam=$request->txtslnam;
            

            $doanhthuthang = DB::table('detail_bill_sale')
            ->join('bill_sale', 'bill_sale.id', '=', 'detail_bill_sale.bill_sale_id')
            ->join('accessories', 'accessories.id', '=', 'detail_bill_sale.accessories_id')
            ->select('detail_bill_sale.*', 'bill_sale.total','bill_sale.stamonth','bill_sale.stayear','bill_sale.sale_date','accessories.accessories_name')
            ->where('stamonth',$request->txtslthang)
            ->where('stayear',$request->txtslnam)
            ->where('bill_sale.status','1')
            ->get();

            $tongdthu = DB::table('detail_bill_sale')
            ->join('bill_sale', 'bill_sale.id', '=', 'detail_bill_sale.bill_sale_id')
            ->join('accessories', 'accessories.id', '=', 'detail_bill_sale.accessories_id')
            ->select('detail_bill_sale.*', 'bill_sale.total','bill_sale.stamonth','bill_sale.stayear','bill_sale.sale_date','accessories.accessories_name')
            ->where('stamonth',$request->txtslthang)
            ->where('stayear',$request->txtslnam)
            ->where('bill_sale.status','1')
            ->sum('total_money');


            return view('admin.thongke.doanhthuthang')->with('doanhthuthang',$doanhthuthang)->with('thang',$thang)->with('nam',$nam)->with('tongdthu',$tongdthu);
    }
}
