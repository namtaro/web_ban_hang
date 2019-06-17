<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\AccessoriesModel;
use App\Cateloaimodel;
use DateTime;

class LinhkienController extends Controller
{
    public function getlistlinhkien(){
    	$data=Cateloaimodel::select('id','cate_name','parent_id')->get();
    	$AccessoriesModel=AccessoriesModel::select('id','accessories_name','origin','amount','input_unit_price','sale_unit_price','description','status','image','cate_accessories_id')->get();
        /*$parent_id = $data->unique(function ($va)
            {
                return $va->parent_id;
            });
       
        foreach ($data as $key => $v) {
           $a = $parent_id->first(function ($key, $value) use ($v) {
                if($value->parent_id == $v->id)
                    return $value;
                return null;
            });
           if(is_null($a)){
            $tem[] = $v;
           }

        }*/
        
     
    	return view('admin.linhkien.list',['linhkien'=>$AccessoriesModel],['catedata'=>$data]);

    }
    public function postaddlinhkien(Request $request){

        $this->validate($request, 
            [   'txtaccessories_nameadd' => 'min:2|max:255',
                
            ],

            [   'txtaccessories_nameadd.min' => 'Tên linh kiện từ 2 ký tự đến 255  ',
               


                ]
        );

    	$AccessoriesModel=new AccessoriesModel;
    	$file=$request->file('txtfile');
    	$AccessoriesModel->accessories_name=$request->txtaccessories_nameadd;
    	$AccessoriesModel->origin=$request->txtoriginadd;
    	$AccessoriesModel->amount	=$request->txtamountadd;
    	$AccessoriesModel->input_unit_price=$request->txtinput_unit_priceadd;
    	$AccessoriesModel->sale_unit_price=$request->txtsale_unit_priceadd;
    	$AccessoriesModel->description=$request->txtdescriptionadd;
    	$AccessoriesModel->status	=$request->txttrangthaiadd;
    	if(strlen($file) > 0){
    		$filename=time().'.'.$file->getClientOriginalName();
    		$destination='upload/Imagegoc/';
    		$file->move($destination,$filename);
    		$AccessoriesModel->image=$filename;
    	}
    	$AccessoriesModel->cate_accessories_id=$request->sltcateadd;
    	$AccessoriesModel->created_at=new DateTime();
    	
    	$AccessoriesModel->save();

        echo '<script type="text/javascript">
                alert("Thêm thành công!!!.");
                window.location="';
                echo route('getlistlinhkien');
                echo '"
                </script>'; 

    	//return redirect()->back();
    }

 public function posteditlinhkien(Request $request){
    	$AccessoriesModel = AccessoriesModel::find($request->txtidedit);
    	$file=$request->file('txtfileedit');
    	$AccessoriesModel->accessories_name=$request->txtaccessories_nameedit;
    	$AccessoriesModel->origin=$request->txtoriginedit;
    	$AccessoriesModel->amount	=$request->txtamountedit;
    	$AccessoriesModel->input_unit_price=$request->txtinput_unit_priceedit;
    	$AccessoriesModel->sale_unit_price=$request->txtsale_unit_priceedit;
    	$AccessoriesModel->description=$request->txtdescriptionedit;
    	$AccessoriesModel->status	=$request->txttrangthaiedit;
    	if(strlen($file)>0 && strlen($request->fimage)>0){
    		$tenfile=$request->fimage;
    		if(file_exists(public_path().'/upload/Imagegoc/'.$tenfile)){
			unlink(public_path().'/upload/Imagegoc/'.$tenfile);

		}
		$filename=time().'.'.$file->getClientOriginalName();
    		$destination='upload/Imagegoc/';
    		$file->move($destination,$filename);
    		$AccessoriesModel->image=$filename;
    	}
        if(strlen($file)>0 && strlen($request->fimage)==0){
            
        $filename=time().'.'.$file->getClientOriginalName();
            $destination='upload/Imagegoc/';
            $file->move($destination,$filename);
            $AccessoriesModel->image=$filename;
        }

    	$AccessoriesModel->cate_accessories_id=$request->sltcateedit;
    	$AccessoriesModel->updated_at=new DateTime();
    	$AccessoriesModel->save();


        echo '<script type="text/javascript">
                alert("Sửa thành công!!!.");
                window.location="';
                echo route('getlistlinhkien');
                echo '"
                </script>'; 

    	//return redirect()->back();
    }

       public function postdellinhkien(Request $request){
		$AccessoriesModel=AccessoriesModel::find($request->txtiddel);	
		if(file_exists(public_path().'/upload/Imagegoc/'.$AccessoriesModel->image)){
			//unlink(public_path().'/upload/Imagegoc/'.$AccessoriesModel->image);

		}
    	$AccessoriesModel->delete();

        echo '<script type="text/javascript">
                alert("Xóa thành công!!!.");
                window.location="';
                echo route('getlistlinhkien');
                echo '"
                </script>'; 

    	//return redirect()->back();
		
	}
}
