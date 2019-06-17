<?php

namespace App\Http\Controllers\frontend;

//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\Checkoutrequest;
use App\Http\Controllers\Controller;
use App\AccessoriesModel;
use Cart;
use App\CustomerModel;
use App\Detail_bill_sale_Model;
use App\Bill_sale_Model;
use DateTime,Mail;
use DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
		

	public function cart(){

			if (Request::isMethod('post')) {
            $this->data['title'] = 'Giỏ hàng của bạn';
            $cartid = Request::get('txtcartid');
            $sanpham = AccessoriesModel::find($cartid);
           
            Cart::add(array('id' => $cartid,
                'name' => $sanpham->accessories_name,
                'price' => $sanpham->sale_unit_price,
                'qty' => '1','options'=>array('image'=>$sanpham->image)));
        }
        $cart = Cart::content();
        /*$this->data['cart'] = $cart;*/
        //dd($cart);
        //print_r($cart);
       // return view('frontend.listhang.cartdetail', $this->data);
       return redirect()->route('getgiohang');
		}	


			public function getcartdetail(){

			if (Request::isMethod('post')) {
            $this->data['title'] = 'Giỏ hàng của bạn';
            $cartid = Request::get('txtcartid');
            $soluong=Request::get('txtsoluong');
            $sanpham = AccessoriesModel::find($cartid);
           
            Cart::add(array('id' => $cartid,
                'name' => $sanpham->accessories_name,
                'price' => $sanpham->sale_unit_price,
                'qty' => $soluong,'options'=>array('image'=>$sanpham->image)));
        }
        $cart = Cart::content();
        /*$this->data['cart'] = $cart;*/
        //dd($cart);
        //print_r($cart);
       // return view('frontend.listhang.cartdetail', $this->data);
       return redirect()->route('getgiohang');
		}	

		public function getgiohang(){
			$cart = Cart::content()->toArray();
			$total = Cart::subtotal();
			return view('frontend.listhang.cartdetail',compact('cart','total'));
		}
		public function getxoasp($id){

			Cart::remove($id);
			return redirect()->route('getgiohang');
		}

		public function getcapnhat(){
			if (Request::ajax()) {
				$id=Request::get('id');
				$qty=Request::get('qty');
				Cart::update($id,$qty);
				echo "oke";
			}
		}


		public function getCheckout() {


        $cart = Cart::content()->toArray();
		$total = Cart::subtotal();

       
         
        return view('frontend.listhang.checkout',compact('cart','total'));
    }

    public function postCheckout(Checkoutrequest $request){


    	/*$idsanpham=Request::get('txtid');
    	$soluongsp=Request::get('txtsoluong');

    	$layidsp=AccessoriesModel::select('amount')->where('id',$idsanpham)->first();
    	if ($layidsp->amount<$soluongsp) {
    		 echo '<script type="text/javascript">
                alert("email này đã được đăng ký mời bạn đăng nhập!!!.");
                </script>'; 
                return redirect()->back();
                //return;
    	}else{
    		dd("sa");
    	}*/

    	$cartinfo=Cart::content();
    	$emailkh=Request::get('txtemailkhget');
        $timemailtontai=CustomerModel::select('id','cus_name','email','address','phone','confirmed')->where('email',$emailkh)->get();
       
        //dd($timemailtontai->phone); 
       
        
    	try{
            if (Request::get('txtgetidkh')>0) {
                
            }
            else{

                 
                if (count($timemailtontai)>0) {

                     foreach ($timemailtontai as $key => $value) {
       
                    if ($value->confirmed==1) {
                         echo '<script type="text/javascript">
                alert("email này đã được đăng ký mời bạn đăng nhập!!!.");
                window.location="';
                echo route('getLogin_cus');
                echo '"
                </script>'; 
                return  ;
                
                    }
                    else{
            $CustomerModel =CustomerModel::find($value->id);
            $CustomerModel->cus_name=Request::get('txttenkhach');   
            $CustomerModel->address=Request::get('txtdiachikh');
            $CustomerModel->phone=Request::get('txtsdtkh');
            $CustomerModel->updated_at=new DateTime();
            $CustomerModel->save();
                
                    }
                }
                }else{
                
    		$CustomerModel=new CustomerModel;
    		$CustomerModel->cus_name=Request::get('txttenkhach');
    		$CustomerModel->email=Request::get('txtemailkhget');	
    		$CustomerModel->address=Request::get('txtdiachikh');
    		$CustomerModel->phone=Request::get('txtsdtkh');
    		$CustomerModel->created_at=new DateTime();
    		$CustomerModel->save();
        }
            }

            $laythangnam=new DateTime();
    		$Bill_sale_Model=new Bill_sale_Model;
    		$Bill_sale_Model->sale_date=new DateTime();
            $Bill_sale_Model->stamonth=$laythangnam->format('m');
            $Bill_sale_Model->stayear=$laythangnam->format('Y');
    		$Bill_sale_Model->total = str_replace(',', '', Cart::subtotal());
    		$Bill_sale_Model->note=Request::get('txtghichukh');
            if (Request::get('txtgetidkh')>0) {
            $Bill_sale_Model->customer_id=Request::get('txtgetidkh');    
            }else{
            $Bill_sale_Model->customer_id=$CustomerModel->id;    
            }
    		
    		//$Bill_sale_Model->personnel_id=2;


    		$Bill_sale_Model->save();


            $gettensp;
    		if (count($cartinfo) >0) {
                foreach ($cartinfo as $key => $item) {
                    $Detail_bill_sale_Model = new Detail_bill_sale_Model;
                    $Detail_bill_sale_Model->bill_sale_id = $Bill_sale_Model->id;
                    $Detail_bill_sale_Model->accessories_id = $item->id;
                    $Detail_bill_sale_Model->amount = $item->qty;
                    $Detail_bill_sale_Model->rate = $item->price;
                    $Detail_bill_sale_Model->total_money = $item->price*$item->qty;
                    $Detail_bill_sale_Model->created_at=new DateTime();
                    $Detail_bill_sale_Model->save();

                }
            }
            $billdetail1 = DB::table('detail_bill_sale')
            ->join('accessories', 'detail_bill_sale.accessories_id', '=', 'accessories.id')
            ->where('bill_sale_id',$Bill_sale_Model->id)
            ->select('detail_bill_sale.*', 'accessories.accessories_name', 'accessories.sale_unit_price','accessories.image')
            ->get();
            //dd($billdetail1);
            $data = ['tongcong' => Cart::subtotal()];
            //dd($data);
            
            Mail::send('frontend.email.emailxacnhan',['billdetail1'=>$billdetail1,'data'=>$data], function ($message) {
            $message->from('nhongnhi157@gmail.com', 'Linhkienshop');

            $message->to(Request::get('txtemailkhget'),' ')->subject('Đơn hàng của bạn');
});
            Cart::destroy();
    	}
    	catch (Exception $e) {
            echo $e->getMessage();
        }
        return view('frontend.listhang.xacnhandonhang',compact('emailkh'));
    }

    public function suathongtinkhach(){
        $getid=Request::get('txtsuathongtin_id');
        $CustomerModel=CustomerModel::where('id',$getid)->first();
        $CustomerModel->cus_name=Request::get('txttenkhachtt');
         $CustomerModel->address=Request::get('txtdiachikhtt');
          $CustomerModel->phone=Request::get('txtsdtkhtt');
          $CustomerModel->save();
                  echo '<script type="text/javascript">
                alert("Sữa thành công!!!.");
                window.location="';
                echo route('getCheckout');
                echo '"
                </script>';

    }
}
