<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/leaderboard', 'OrderController@leaderboard');
// Đăng ký về sau sẽ xóa
Route::get('register', 'Auth\RegisterController@getRegister');
Route::post('register', 'Auth\RegisterController@postRegister');
Route::get('/profile/{id}','UserController@ViewProfile')->name('profile')->middleware('auth');
Route::post('/profile/{id}','UserController@EditViewProfile')->middleware('auth');

// Đăng nhập và xử lý đăng nhập
Route::get('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
 
// Đăng xuất
Route::get('logout', [ 'as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);



Route::get('/', 'HomeController@getDashboard')->name('home');

// TẠO TÀI KHOẢN
// Route::get('/user', function () {
//     return view('account.list');
// });


Route::get('/user/edit', function () {
    return view('account.edit');
});
// ->BẮT ĐẦU ROUTE CỦA ADMIN
Route::group(['prefix' => 'manager', 'middleware' => ['admin']], function(){

    Route::get('/account','UserController@getListUser')->name('manager.accounts');
    Route::get('/account/create','UserController@getCreateUser')->name('manager.createAccount');
    Route::get('/account/edituser/{id}','UserController@getEditUser')->name('manager.editUser');
    Route::post('/account/edituser/{id}','UserController@postEditUser');
    Route::post('/account/create','UserController@addUser')->name('manager.createUser');
    Route::get('/account/deleteuser/{id}','UserController@deleteUser')->name('manager.deleteUser');

});
// KẾT THÚC ROUTE CỦA ADMIN<-

// ->BẮT ĐẦU ROUTE CỦA GIÁM ĐỐC
Route::group(['prefix' => 'director', 'middleware' => ['director']], function(){
	
});
// KẾT THÚC ROUTE CỦA GIÁM ĐỐC<-

// -> BẮT ĐẦU ROUTE CỦA ĐIỀU PHỐI
Route::group(['prefix' => 'coordinator', 'middleware' => ['coordinator']], function(){

	Route::get('/customer','CustomerController@getListCustomer')->name('coordinator.customer');
    Route::get('/customer/create','CustomerController@getCreateCustomer')->name('coordinator.createCustomer');
    Route::post('/customer/create','CustomerController@postCreateCustomer');
    Route::get('/customer/edit/{id}','CustomerController@getEditCustomer')->name('coordinator.editCustomer');
    Route::post('/customer/edit/{id}','CustomerController@postEditCustomer');
    Route::get('/customer/delete/{id}','CustomerController@delteCustomer')->name('coordinator.deleteCustomer');

	Route::get('/truck', 'TruckController@getListTruck')->name('coordinator.truck.list');
	Route::get('/truck/create', 'TruckController@getCreateTruck')->name('coordinator.truck.create');
	Route::post('/truck/create', 'TruckController@postCreateTruck');
	Route::get('/truck/{id}/edit', 'TruckController@getEditTruck')->name('coordinator.truck.edit');
	Route::post('/truck/{id}/edit', 'TruckController@postEditTruck');
	Route::get('/truck/{id}/delete', 'TruckController@deleteTruck')->name('coordinator.truck.delete');
	Route::get('/truck/{id}/edit/deleteImg', 'TruckController@deleteImage');
	Route::get('server-images/{id}', 'TruckController@getServerImages')->name('server-images');
	Route::post('/truck/{id}/schedule', 'TruckController@newMaintenance')->name('coordinator.schedule.post');
	Route::get('/truck/{id}/schedule/finish', 'TruckController@finishMaintenance')->name('coordinator.schedule.finish');
    Route::get('/truck/detail/{id}', 'TruckController@getDetailTruck')->name('coordinator.truck.detail');
    //order
    Route::get('order', 'OrderController@getOrder')->name('coordinator.order.list');
    Route::get('order/create', 'OrderController@getCreateOrder')->name('coordinator.order.create');
    Route::post('order/create', 'OrderController@postCreateOrder');
    Route::get('order/edit/{id}', 'OrderController@getEditOrder')->name('coordinator.order.edit');
    Route::post('order/edit/{id}', 'OrderController@postEditOrder');
    Route::get('order/{id}', 'OrderController@getDetailOrder')->name('coordinator.order.detail');
    Route::get('order/delete/{id}', 'OrderController@deleteOrder')->name('coordinator.order.delete');
    Route::post('order/{id}', 'OrderController@editTransport')->name('coordinator.order.change');

});
// KẾT THÚC ROUTE CỦA ĐIỀU PHỐI -<

// -> BẮT ĐẦU ROUTE CỦA KINH DOANH
Route::group(['prefix' => 'seller', 'middleware' => ['seller']], function(){
    Route::get('/customer','CustomerController@getListCustomer')->name('seller.customer');
    Route::get('/customer/create','CustomerController@getCreateCustomer')->name('seller.createCustomer');
    Route::post('/customer/create','CustomerController@postCreateCustomer');
    Route::get('/customer/edit/{id}','CustomerController@getEditCustomer')->name('seller.editCustomer');
    Route::post('/customer/edit/{id}','CustomerController@postEditCustomer');
    Route::get('/customer/delete/{id}','CustomerController@delteCustomer')->name('seller.deleteCustomer');


    Route::get('order', 'OrderController@getOrder')->name('seller.order.list');
    Route::get('order/create', 'OrderController@getCreateOrder')->name('seller.order.create');
    Route::post('order/create', 'OrderController@postCreateOrder');
    Route::get('order/{id}/edit', 'OrderController@getEditOrder')->name('seller.order.edit');
    Route::post('order/{id}/edit', 'OrderController@postEditOrder');
    Route::get('order/{id}', 'OrderController@getDetailOrder')->name('seller.order.detail');
    Route::post('order/{id}', 'OrderController@editTransport')->name('seller.order.change');
    Route::get('order/{id}/delete', 'OrderController@deleteOrder')->name('seller.order.delete');
	
});
// KẾT THÚC ROUTE CỦA KINH DOANH -<

// -> BẮT ĐẦU ROUTE CỦA NHÂN SỰ
Route::group(['prefix' => 'recruiter', 'middleware' => ['recruiter']], function(){
	
});
// KẾT THÚC ROUTE CỦA NHÂN SỰ -<

// -> BẮT ĐẦU ROUTE CỦA KẾ TOÁN
Route::group(['prefix' => 'clerk', 'middleware' => ['clerk']], function(){
	
});
// KẾT THÚC ROUTE CỦA KẾ TOÁN -<

