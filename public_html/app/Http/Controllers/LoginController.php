<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Artisan;

class LoginController extends Controller
{
    public function getLogin(){
        //echo "show page log in";
    	if(!Auth::check()){
    	//if(!Auth::guard('User')->check()){
    	    
    	    //dd(Auth::check());
    	    //print_r(Session::get('email'));die;
    		return view('admin.login.login');
    		
    	}else{
    	   // dd(2);
    	return redirect()->route('getadmin');
    	}
    	
    }

    public function postLogin(Request $request){
    	$login=['email' => $request->txtemail, 'password' => $request->txtpw,'level'=>1];
        $login2=['email' => $request->txtemail, 'password' => $request->txtpw,'level'=>2];
      //  Artisan::call('cache:clear');
   // return "Cache is cleared";
   
    	if (Auth::attempt($login) || Auth::attempt($login2)) {
    	    if (Auth::check()) {
            // Authentication passed...
            /* echo '<script type="text/javascript">
                 alert("Đăng nhập thành công!!!.");
                
                 </script>';*/
                 /* window.location="';
                 echo route('getadmin');
                 echo '"*/
            return redirect()->route('getadmin');
            //Redirect::route('getadmin');
    	   }
        }
        else{
           echo '<script type="text/javascript">
                alert("Lỗi Đăng nhập !Sai email hoặc mật khẩu.");
                window.location="';
                echo route('getLogin');
                echo '"
                </script>';
        	//return redirect()->back();
        }
    }

    public function getLogout(){
    	Auth::logout();
    return redirect()->route('getLogin');
    }

    public function getadmin(){
        return view('admin.dashboard.main');
    }
}
