<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\CustomerModel;

class LoginCusController extends Controller
{
   public function getLoginCus(){
    	if(!Auth::guard('CustomerModel')->check()){
    		return view('frontend.login.login');
    		
    	}else{
    	return redirect('home');
    	}
    	
    }

    public function postLoginCus(Request $request){
    	$login=['email' => $request->txtemail, 'password' => $request->txtpw,'confirmed'=>1,];
        
    	if (Auth::guard('CustomerModel')->attempt($login)) {
            
            return redirect('home');
        }
        else{
        	//return redirect()->back();
        	
            echo '<script type="text/javascript">
                alert("Xin Lỗi !Eamil hoặc mật khẩu không đúng.");
                window.location="';
                echo route('getLogin_cus');
                echo '";
                </script>';
        }
    }

    public function getLogout_cus(){
    	Auth::guard('CustomerModel')->logout();
    return redirect()->route('getLogin_cus');
    }

    
}
