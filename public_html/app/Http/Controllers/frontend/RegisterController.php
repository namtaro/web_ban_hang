<?php

namespace App\Http\Controllers\frontend;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\CustomerModel;
use Mail;

class RegisterController extends Controller
{
    public function getregister(){
    	return view('frontend.register.register');
    }


    /*public function getxacthuc(){
    	return view('frontend.register.xacthucmail');
    }*/
    public function postregister(Request $request){
        $layEmail=$request->txtEmail;
        $timthongtinthuocemail=CustomerModel::where('email',$layEmail)->first();
        //dd($timthongtinthuocemail);
        //dd($timthongtinthuocemail->confirmed);

        $confirmation_code = time().uniqid(true);
        if ($timthongtinthuocemail==null) {
            //dd("dung");
            $CustomerModel=new CustomerModel;
        $CustomerModel->cus_name=$request->txtname;
        $CustomerModel->email=$request->txtEmail;
        $CustomerModel->address=$request->txtdiachi;
        $CustomerModel->phone=$request->txtsdt;
        $CustomerModel->password=bcrypt($request->txtpassword);
        $CustomerModel->confirmation_code = $confirmation_code;
        $CustomerModel->confirmed = 0;
        $CustomerModel->save();

                $codexacthuc=['code'=>$confirmation_code];
        }else{
        if ($timthongtinthuocemail->confirmed==0) {
            $this->validate($request, 
            
            [   'retxtpassword' => 'same:txtpassword|min:7|max:22',
                'txtsdt' =>'numeric|min:0',
                'txtname'=>'max:50',
            ],

            [   'retxtpassword.same' => 'mật khẩu không trùng khớp',
                'retxtpassword.min'=>'Mật khẩu phải  7 kí tự trở lên',
                'retxtpassword.max'=>'Mật khẩu phải nhỏ hơn  22 kí tự ',
                'txtsdt.min'=>'số điện thoại chưa đúng định dạng',
                'txtsdt.numeric'=>'số điện thoại không chứ ký tự',
                'txtname.max'=>'Tên dưới 50 ký tự',


                ]
        );
        }else{
    	$this->validate($request, 
    		
            [   'retxtpassword' => 'same:txtpassword|min:7|max:22',
                'txtEmail'=>'required|unique:customer,email',
                'txtsdt' =>'numeric|min:0',
                'txtname'=>'max:50',
            ],

            [   'retxtpassword.same' => 'mật khẩu không trùng khớp',
                'retxtpassword.min'=>'Mật khẩu phải  7 kí tự trở lên',
                'retxtpassword.max'=>'Mật khẩu phải nhỏ hơn  22 kí tự ',
                'txtEmail.unique'=>'Email đã tồn tại',
                'txtsdt.min'=>'số điện thoại chưa đúng định dạng',
                'txtsdt.numeric'=>'số điện thoại không chứ ký tự',
                'txtname.max'=>'Tên dưới 50 ký tự',


                ]
    	);
}

}
    	$email=$request->txtEmail;
    	//$dd='tranminhtuyenphong3@gmail.com';
    	$confirmation_code = time().uniqid(true);
        if ($timthongtinthuocemail==null) {}else{
        if ($timthongtinthuocemail->confirmed==0) {
        $CustomerModel =CustomerModel::find($timthongtinthuocemail->id);
        $CustomerModel->cus_name=$request->txtname;
        $CustomerModel->address=$request->txtdiachi;
        $CustomerModel->phone=$request->txtsdt;
        $CustomerModel->password=bcrypt($request->txtpassword);
        $CustomerModel->confirmation_code = $confirmation_code;
        $CustomerModel->confirmed = 0;
        $CustomerModel->save();

                $codexacthuc=['code'=>$confirmation_code];

        }else{
    	$CustomerModel=new CustomerModel;
    	$CustomerModel->cus_name=$request->txtname;
    	$CustomerModel->email=$request->txtEmail;
    	$CustomerModel->address=$request->txtdiachi;
    	$CustomerModel->phone=$request->txtsdt;
    	$CustomerModel->password=bcrypt($request->txtpassword);
    	$CustomerModel->confirmation_code = $confirmation_code;
        $CustomerModel->confirmed = 0;
        $CustomerModel->save();

        		$codexacthuc=['code'=>$confirmation_code];
            }}

            Mail::send('frontend.register.emailxacthuc',['codexacthuc'=>$codexacthuc], function ($message) use ($request){
            $message->from('nhongnhi157@gmail.com', 'Linhkienshop');

            $message->to($request->txtEmail,$request->txtname)->subject('Xác thực email');

            });
        
        return view('frontend.register.xacthucmail')->with('email',$email);
    }

    public function getverify($code){
    	$CustomerModel=CustomerModel::where('confirmation_code',$code)->first();
    	//$CustomerModel=CustomerModel::select('confirmation_code','confirmed')->get();

    	//dd($CustomerModel);
    	if ($CustomerModel->count()>0) {
    		$CustomerModel->confirmed=1;
    		$CustomerModel->confirmation_code=null;
    		$CustomerModel->save();
    		 $notification_status = 'Bạn đã xác nhận thành công';
    	}else{
    		$notification_status ='Mã xác nhận không chính xác';
    	}
    	return redirect(route('getLogin_cus'))->with('status', $notification_status);
    }
}
