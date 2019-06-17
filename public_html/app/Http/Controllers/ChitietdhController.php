<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Bill_sale_Model;
use App\CustomerModel;
use App\Detail_bill_sale_Model;
use DB;
use DateTime;

class ChitietdhController extends Controller
{
    public function gethd(){
    	
    	$bill = DB::table('bill_sale')
            ->join('customer', 'bill_sale.customer_id', '=', 'customer.id')
            ->select('bill_sale.*', 'customer.cus_name', 'customer.email','customer.address')
            ->get();

            $getnameper = DB::table('bill_sale')
            ->join('personnel', 'bill_sale.personnel_id', '=', 'personnel.id')
            ->select('bill_sale.id',  'personnel.name')
            ->get();
            
    	return view('admin.chitietdonhang.dsdh',['bill'=>$bill],['getnameper'=>$getnameper]);


    }
    public function getchitiethd($id){
    	$bill = DB::table('bill_sale')
            ->join('customer', 'bill_sale.customer_id', '=', 'customer.id')
            ->where('bill_sale.id',$id)
            ->select('bill_sale.*', 'customer.cus_name', 'customer.email','customer.address','customer.phone')
            ->get();

            $billdetail = DB::table('detail_bill_sale')
            ->join('accessories', 'detail_bill_sale.accessories_id', '=', 'accessories.id')
            ->where('bill_sale_id',$id)
            ->select('detail_bill_sale.*', 'accessories.accessories_name', 'accessories.sale_unit_price','accessories.image')
            ->get();

           
            
            
    	return view('admin.chitietdonhang.chitietdh',['bill'=>$bill],['billdetail'=>$billdetail]);
    }
    public function postxulydh(Request $request){
    	$Bill_sale_Model =Bill_sale_Model::find($request->txtbill_sale_id);
        $Bill_sale_Model->status = 1;
        $Bill_sale_Model->personnel_id=$request->txtbill_sale_personnel_id;
        $Bill_sale_Model->updated_at	=new DateTime();
        $Bill_sale_Model->save();
        return redirect()->back();
    }

    public function getchitiethddel($id){
    	$hd=DB::table('detail_bill_sale')
            ->where('bill_sale_id',$id)
            ->count();
            if ($hd==0) {
            	echo '<script type="text/javascript">
    			alert("Xóa thành công!!!.");
    			window.location="';
    			echo route('gethd');
    			echo '"
    			</script>';
            	DB::table('bill_sale')
            ->where('id',$id)
            ->delete();
            }else{
            	 echo '<script type="text/javascript">
    			alert("Xóa thành công!!!.");
    			window.location="';
    			echo route('gethd');
    			echo '"
    			</script>';
            	DB::table('detail_bill_sale')
            ->where('bill_sale_id',$id)
            ->delete();
            DB::table('bill_sale')
            ->where('id',$id)
            ->delete();
           
            			}
    			
    }
}
/*alert("Xin Lỗi !bạn không được xóa danh mục này.");
    			window.location="';
    			echo route('getlistloai');
    			echo '";
    			</script>';
            	DB::table('detail_bill_sale')
            ->where('bill_sale_id',$id)
            ->delete();

            DB::table('bill_sale_id')
            ->where('id',$id)
            ->delete();

            }*/