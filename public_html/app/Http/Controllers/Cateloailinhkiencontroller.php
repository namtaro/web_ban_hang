<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
//use App\Http\Requests\Cateaddrequest;
use App\Cateloaimodel;
use DateTime;
use App\AccessoriesModel;

class Cateloailinhkiencontroller extends Controller
{
   
     public function getlistloai(){
    		$data=Cateloaimodel::select('id','cate_name','parent_id')->get();
    		return view('admin.loailinhkien.add',['datacate'=>$data]);
 
    }
    public function postaddloai(Request $request){

        $this->validate($request, 
            
            [   'txtLoaiadd'=>'unique:cate_accessories,cate_name'],
            [   'txtLoaiadd.unique'=>'Tên loại đã tồn tại ']
        );
        $tontaisp=AccessoriesModel::where('cate_accessories_id',$request->sltcateadd)->count();
        //dd($tontaisp);
        if($tontaisp==0)
        {

    	 $Cateloaimodel = new Cateloaimodel;
        $Cateloaimodel->cate_name = $request->txtLoaiadd;
        $Cateloaimodel->parent_id=$request->sltcateadd;
        $Cateloaimodel->created_at	=new DateTime();
        $Cateloaimodel->save();


         echo '<script type="text/javascript">
                alert("Thêm thành công!!!.");
                window.location="';
                echo route('getlistloai');
                echo '"
                </script>'; 
                    }
                else{
                             echo '<script type="text/javascript">
                alert("Loại linh kiện này đã tồn tại sản phẩm nên không thể thêm loại này làm cha!!!.");
                window.location="';
                echo route('getlistloai');
                echo '"
                </script>';
                }

        //return redirect()->back();
    }

    public function getdeletecate($id){
    	$parent=Cateloaimodel::where('parent_id', $id)->count();
        $demsp=AccessoriesModel::where('cate_accessories_id',$id)->count();
        //dd($demsp);
    	if ($parent==0 && $demsp==0) {
    	$data=Cateloaimodel::find($id);	
    	$data->delete();
        echo '<script type="text/javascript">
                alert("Xóa thành công!!!.");
                window.location="';
                echo route('getlistloai');
                echo '"
                </script>';
    	//return redirect()->route('getlistloai');
    	}
    	else{
    			echo '<script type="text/javascript">
    			alert("Xin Lỗi !bạn không được xóa danh mục này.");
    			window.location="';
    			echo route('getlistloai');
    			echo '";
    			</script>';

    	}
    	

    }

    public function postupdateloai(Request $request){

        $tontaisp=AccessoriesModel::where('cate_accessories_id',$request->sltcateedit)->count();
        //dd($tontaisp);
        if($tontaisp==0)
        {
        if($request->txtcateid==$request->sltcateedit)
        {
             echo '<script type="text/javascript">
                alert("Bạn không thể chọn cha là chính bạn vui lòng chọn lại!!.");
                window.location="';
                echo route('getlistloai');
                echo '"
                </script>'; 
        }
        else{
            $Cateloaimodel =Cateloaimodel::find($request->txtcateid);    
        $Cateloaimodel->cate_name = $request->txtLoaiedit;
        $Cateloaimodel->parent_id=$request->sltcateedit;
        $Cateloaimodel->updated_at  =new DateTime();
        $Cateloaimodel->save();

         echo '<script type="text/javascript">
                alert("Sữa thành công!!!.");
                window.location="';
                echo route('getlistloai');
                echo '"
                </script>'; 

        }
            }
                else{
                             echo '<script type="text/javascript">
                alert("Loại linh kiện này đã tồn tại sản phẩm nên không thể thêm loại này làm cha!!!.");
                window.location="';
                echo route('getlistloai');
                echo '"
                </script>';
                }
    		

        //return redirect()->back();//hay return redirect()->route('getaddloai');
 
    }
    /* public function getupdateloai(Cateaddrequest $request){
     	  $Cateloaimodel = Cateloaimodel::findOrFail($request->txtcateid);
        $Cateloaimodel->update($request->all());
       
        return back();
 
    }*/

   


}
