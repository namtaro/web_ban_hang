

function xacnhanxoa (msg){
	if (window.confirm(msg)) {
		return true;
	}
	else{
		return false;
	}
}

 
function capnhatcate(button){
	  var myid = $(button).data('myid') ;
	  var cate_name = $(button).data('mycate_name') ;
	  var parent_id=$(button).data('parent_id');

	 /* $('#txtcatepaeantid').val(parent_id);*/
	  $('#parent_id').val(parent_id);
	  $('#cate_name').val(cate_name);

	  $('#cate_id').val(myid);


}
function capnhatpersonnel(button){
	var id = $(button).data('id');
	var name = $(button).data('name');
	var email = $(button).data('email');
	var sex = $(button).data('sex');
	var birthday = $(button).data('birthday');
	var address = $(button).data('address');
	var phone = $(button).data('phone');
	var password = $(button).data('password');
	var level = $(button).data('level');


	$('#tennvedit').val(name);
	  $('#emailnvedit').val(email);

	  $('#gtnvedit').val(sex);
	  $('#nsnvedit').val(birthday);
	  $('#dcnvedit').val(address);

	  $('#phonenvedit').val(phone);
	  $('#mknvedit').val(password);
	  $('#capnvedit').val(level);

	  $('#idedit').val(id);


}
function xoapersonnel(button){
	var id=$(button).data('id');
	$('#iddel').val(id);
}


function suakhachhang(button){
	var id = $(button).data('id');
	var name = $(button).data('name');
	var email = $(button).data('email');
	var address = $(button).data('address');
	var phone = $(button).data('phone');


	$('#nameedit').val(name);
	  $('#emailedit').val(email);
	   $('#addressedit').val(address);

	  $('#phoneedit').val(phone);
	  $('#idedit').val(id);

}


function xoakhachhang(button){
	var id=$(button).data('id');
	$('iddel').val(id);
}

function sualinhkien(button){
	var id=$(button).data('id');
	var accessories_name=$(button).data('accessories_name');
	var origin=$(button).data('origin');
	var amount=$(button).data('amount');
	var input_unit_price=$(button).data('input_unit_price');
	var sale_unit_price=$(button).data('sale_unit_price');
	var description=$(button).data('description');
	var status=$(button).data('status');
	var cate_accessories_id=$(button).data('cate_accessories_id');
	var image=$(button).data('image');

	 $('#idedit').val(id);
	 $('#loailkedit').val(cate_accessories_id);
	 $('#tenlkedit').val(accessories_name);
	 $('#nglkedit').val(origin);
	 $('#amountedit').val(amount);
	 $('#gnvedit').val(input_unit_price);
	 $('#gbredit').val(sale_unit_price);
	 $('#mtedit').val(description);
	 $('#trangthaiedit').val(status);
	 $('#imageedit').val(image);
}

function xoalinhkien(button){
	 var id=$(button).data('id');

	 $('#iddel').val(id); 
}


/*update cart*/
$(document).ready(function (){
$(".cartupdate").click(function (){
	var rowId=$(this).attr('id');
	//var qty=$(this).parent().parent().find(".qty1").val();
	var qty=$(this).parent().parent().find(".qty").val();
var token=$("input[name='_token']").val();

	$.ajax({
		url:'capnhat/'+rowId+'/'+qty,
		type:'GET',
		cache:false,
		data:{"_token":token,"id":rowId,"qty":qty},
		success:function(data){
			if (data=="oke") {
				window.location="cartdetail"
			}

		}

	});
});

});

/*$('#search').on('keyup',function(){
	$value=$(this).val();
	$.ajax({
		type:'GET',
		url :'search',
		data:{'search':$value},
		success:function(data){
			console.log(data);
		}
	});
});*/

 $(document).ready(function() {
    $('.thongbao').delay(8000).slideUp();
} );

/**/


$(document).ready(function() {
    $('#khsearch').DataTable();
} );


$(document).ready(function() {
    $('#lksearch').DataTable();
} );

$(document).ready(function() {
    $('#loaisearch').DataTable();
} );

$(document).ready(function() {
    $('#dhsearch').DataTable();
} );

$(document).ready(function() {
    $('#nvsearch').DataTable();
} );
/*end API search*/
 
 