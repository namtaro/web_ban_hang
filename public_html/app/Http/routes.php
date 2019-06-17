<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('add', function () {
    return view('admin.loailinhkien.add');
});*/
Route::get('tmt_login', ['as' => 'getLogin', 'uses' => 'LoginController@getLogin']);
Route::post('tmt_login', ['as' => 'postLogin', 'uses' => 'LoginController@postLogin']);
Route::get('logout', ['as' => 'getLogout', 'uses' => 'LoginController@getLogout']);

/*Route::get('admin', ['as' => 'admin','middleware' => 'auth', function () {
    return view('admin.master');
}]);
*/
Route::group(['middleware' => 'auth'], function () {
    
    Route::group(['prefix' => 'admin'], function () {
    Route::get('/', ['as' => 'getadmin', 'uses' => 'LoginController@getadmin']);
});

     Route::group(['prefix' => 'loailinkien'], function () {
  	Route::get('list', ['as' => 'getlistloai', 'uses' => 'Cateloailinhkiencontroller@getlistloai']);
  	Route::post('add', ['as' => 'postaddloai', 'uses' => 'Cateloailinhkiencontroller@postaddloai']);
  	Route::get('delete/{id}', ['as' => 'getdeletecate', 'uses' => 'Cateloailinhkiencontroller@getdeletecate']);
  	Route::post('update', ['as' => 'postupdateloai', 'uses' => 'Cateloailinhkiencontroller@postupdateloai']);
	});

     Route::group(['prefix' => 'nhanvien'], function () {
  	Route::get('list', ['as' => 'getlistnhanvien', 'uses' => 'nhanviencontroller@getlistnhanvien'])->middleware('RoleAdmin');
  	Route::post('add', ['as' => 'postaddnhanvien', 'uses' => 'nhanviencontroller@postaddnhanvien']);
  	Route::post('delete', ['as' => 'postdelnhanvien', 'uses' => 'nhanviencontroller@postdelnhanvien']);
  	Route::post('update', ['as' => 'postupdatenhanvien', 'uses' => 'nhanviencontroller@postupdatenhanvien']);
    Route::get('/search', ['as' => 'getlistsearchnv', 'uses' => 'nhanviencontroller@getlistsearchnv']);
});

     Route::group(['prefix' => 'khachhang'], function () {
    Route::get('list', ['as' => 'getlistkhachhang', 'uses' => 'CustomerController@getlistkhachhang']);
    Route::post('add', ['as' => 'postaddkhachhang', 'uses' => 'CustomerController@postaddkhachhang']);
    Route::post('delete', ['as' => 'postdelkhachhang', 'uses' => 'CustomerController@postdelkhachhang']);
    Route::post('update', ['as' => 'postupdatekhachhang', 'uses' => 'CustomerController@postupdatekhachhang']);
});
      Route::group(['prefix' => 'linhkien'], function () {
    Route::get('list', ['as' => 'getlistlinhkien', 'uses' => 'LinhkienController@getlistlinhkien']);
    Route::post('add', ['as' => 'postaddlinhkien', 'uses' => 'LinhkienController@postaddlinhkien']);
    Route::post('delete', ['as' => 'postdellinhkien', 'uses' => 'LinhkienController@postdellinhkien']);
    Route::post('update', ['as' => 'posteditlinhkien', 'uses' => 'LinhkienController@posteditlinhkien']);
});

      Route::group(['prefix' => 'chitietdh'], function () {
    Route::get('list', ['as' => 'gethd', 'uses' => 'ChitietdhController@gethd']);
    Route::get('chitiet/{id}', ['as' => 'getchitiethd', 'uses' => 'ChitietdhController@getchitiethd']);
    Route::post('xulydh', ['as' => 'postxulydh', 'uses' => 'ChitietdhController@postxulydh']);
    Route::get('delete/{id}', ['as' => 'getchitiethddel', 'uses' => 'ChitietdhController@getchitiethddel']);
    
});

      Route::group(['prefix' => 'thongke'], function () {
    Route::get('dhdagiao', ['as' => 'getdhdagiao', 'uses' => 'ThongkeController@getdhdagiao']);
    Route::get('dhchuaduyet', ['as' => 'getdhchuaduyet', 'uses' => 'ThongkeController@getdhchuaduyet']);
    Route::get('doanhthu', ['as' => 'getdoanhthu', 'uses' => 'ThongkeController@getdoanhthu']);
    Route::post('doanhthu', ['as' => 'postdoanhthu', 'uses' => 'ThongkeController@postdoanhthu']);

    
  });

});
/* Route::group(['prefix' => '/'], function () {
    Route::get('/', function () {
    return view('frontend.dashboard.index');
});
});
*/
/*Route::post('cus_login', ['as' => 'postLogincus','namespace'=>'frontend', 'uses' => 'LoginCusController@postLogincus']);*/

/*Route::group(['namespace' => 'frontend'], function() {
      Route::post('cus_login', ['as' => 'postLogincus','uses' => 'LoginCusController@postLogincus']);
    });*/

    Route::get('tmt_login_cus', ['as' => 'getLogin_cus', 'uses' => 'LoginCusController@getLoginCus']);
Route::post('tmt_login_cus', ['as' => 'postLogin_cus', 'uses' => 'LoginCusController@postLoginCus']);
Route::get('logout_cus', ['as' => 'getLogout_cus', 'uses' => 'LoginCusController@getLogout_cus']);


/*frontend*/


Route::group(['namespace' => 'frontend'], function() {
      Route::get('home', ['as' => 'gethomelinhkien','uses' => 'HomeController@gethomelinhkien']);
      Route::get('menu/{id}', ['as' => 'getmenu', 'uses' => 'HomeController@getmenu']);

       Route::get('chitiet/{id}', ['as' => 'getdetaillinhkien', 'uses' => 'DetailController@getdetaillinhkien']);
       Route::post('/cart',['as' => 'getcart', 'uses' =>  'CartController@cart']); //coi chừng còn thiếu mệt
        Route::get('cartdetail', ['as' => 'getgiohang', 'uses' =>  'CartController@getgiohang'])->middleware('CartReturn');
        Route::get('xoasanpham/{id}', ['as' => 'getxoasp', 'uses' =>  'CartController@getxoasp']);
        Route::get('capnhat/{id}/{qty}', ['as' => 'getcapnhat', 'uses' =>  'CartController@getcapnhat']);
        Route::post('/cartdetail',['as' => 'getcartdetail', 'uses' =>  'CartController@getcartdetail']);
        Route::get('/checkout', ['as' => 'getCheckout', 'uses' =>  'CartController@getCheckout'])->middleware('CartReturn');  
        Route::post('/checkout', ['as' => 'postCheckout', 'uses' =>  'CartController@postCheckout']);
        Route::get('search', ['as' => 'getsearch', 'uses' =>  'HomeController@getsearch']);


        Route::get('register', ['as' => 'getregister', 'uses' =>  'RegisterController@getregister']);
       Route::post('register', ['as' => 'postregister', 'uses' =>  'RegisterController@postregister']);
      // Route::get('verifyemail', ['as' => 'getxacthuc', 'uses' =>  'RegisterController@getxacthuc']);
       Route::get('register/verify/{code}',['as' => 'getverify', 'uses' =>  'RegisterController@getverify']);

       Route::post('updatethongtin', ['as' => 'suathongtinkhach', 'uses' => 'CartController@suathongtinkhach']);


    });



Route::get('xacnhan', function () {
    return view('frontend.listhang.xacnhandonhang');
});




