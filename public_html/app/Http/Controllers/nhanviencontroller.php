<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use DB;


class nhanviencontroller extends Controller
{
    
public function getlistnhanvien()
{	
	$data=User::select('id','name','email','sex', 'birthday','address','phone' ,'password','level')->get();
	return view('admin.nhanvien.list',['listuser'=>$data]);
}

public function postaddnhanvien(Request $request){
        if(Auth::user()->id==1){
    	 $User = new User;
        $User->name = $request->txtnameadd;
        $User->email=$request->txtemailadd;
        $User->sex = $request->sltsexadd;
        $User->birthday=$request->txtbirthdayadd;
        $User->address = $request->txtaddressadd;
        $User->phone=$request->txtphoneadd;
        $User->password= bcrypt($request->txtpasswordadd);
        $User->level=$request->sltleveladd;
        $User->created_at	=new DateTime();
        $User->save();
    }
    echo '<script type="text/javascript">
                alert("Thêm thành công!!!.");
                window.location="';
                echo route('getlistnhanvien');
                echo '"
                </script>'; 
        //return redirect()->back();
    }

    public function postupdatenhanvien(Request $request){
        if(Auth::user()->id==1){
    	 $User =User::find($request->txtidedit);
    	 $User->name = $request->txtnameedit;
        $User->email=$request->txtemailedit;
        $User->sex = $request->sltsexedit;
        $User->birthday=$request->txtbirthdayedit;
        $User->address = $request->txtaddressedit;
        $User->phone=$request->txtphoneedit;
        $User->level=$request->sltleveledit;
        $User->updated_at	=new DateTime();
        $User->save();}

        echo '<script type="text/javascript">
                alert("Sữa thành công!!!.");
                window.location="';
                echo route('getlistnhanvien');
                echo '"
                </script>'; 
        //return redirect()->back();
    }
    public function postdelnhanvien(Request $request){
        if(Auth::user()->id==1){
    	$User=User::find($request->txtiddel);	
    	$User->delete();
    }
    	echo '<script type="text/javascript">
                alert("Xóa thành công!!!.");
                window.location="';
                echo route('getlistnhanvien');
                echo '"
                </script>'; 
        //return redirect()->back();
    }

    
}
