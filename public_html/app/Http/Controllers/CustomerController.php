<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\CustomerModel;
use DateTime;

class CustomerController extends Controller
{
    public function getlistkhachhang()
{	
	$CustomerModel=CustomerModel::select('id','cus_name','email','address','phone' )->get();
	return view('admin.khachhang.list',['listcus'=>$CustomerModel]);
    //return $CustomerModel;
}

	public function postaddkhachhang(Request $request){
		$CustomerModel = new CustomerModel;
        $CustomerModel->cus_name = $request->txtnameadd;
        $CustomerModel->email=$request->txtemailadd;
        $CustomerModel->address = $request->txtaddressadd;
        $CustomerModel->phone=$request->txtphoneadd;
        $CustomerModel->password= bcrypt($request->txtpasswordadd);
        $CustomerModel->created_at	=new DateTime();
        $CustomerModel->confirmed	=1;
        $CustomerModel->save();
        echo '<script type="text/javascript">
                alert("Thêm thành công!!!.");
                window.location="';
                echo route('getlistkhachhang');
                echo '"
                </script>';
        //return redirect()->back();
	}

	public function  postupdatekhachhang(Request $request){
		$CustomerModel = CustomerModel::find($request->txtid);
        $CustomerModel->cus_name = $request->txtnameedit;
        $CustomerModel->email=$request->txtemailedit;
        $CustomerModel->address = $request->txtaddressedit;
        $CustomerModel->phone=$request->txtphoneedit;
        $CustomerModel->updated_at	=new DateTime();
        $CustomerModel->save();
        echo '<script type="text/javascript">
                alert("Sữa thành công!!!.");
                window.location="';
                echo route('getlistkhachhang');
                echo '"
                </script>';

        //return redirect()->back();

	}
	public function postdelkhachhang(Request $request){
        
		$CustomerModel=CustomerModel::find($request->txtiddel);	
    	$CustomerModel->delete();
        echo '<script type="text/javascript">
                alert("Xóa thành công!!!.");
                window.location="';
                echo route('getlistkhachhang');
                echo '"
                </script>';

    	//return redirect()->back();
		
	}
}
