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
Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::get('/test', 'ReservationController@test');
Route::get('/tos', 'HomeController@tosList');
Route::get('/contact', 'ContactUsController@index');
Route::get('/policy', 'HomeController@policy');
Route::get('/toc', 'HomeController@listToc');


Route::post('/contact/store', 'ContactUsController@store')->name('contact.store');


Route::post('/paytabs_respond', 'ReservationController@paytabs_respond');

Route::post('/reservation/check_availability', 'ReservationController@check_availability');
Route::get('/', 'ReservationController@create')->name('home');

Route::get('/reservation_check/center/{center_id}/date/{date}/{car?}', 'ReservationController@check')->name('reservation.check');
Route::get('/reservation_check/center/{center_id}/date/{date}/time/{time}', 'ReservationController@reserve')->name('reservation.create');

// Route::get('/reservation/create', 'ReservationController@create');
Route::post('/reservation_check/center/{center_id}/date/{date}/time/{time}', 'ReservationController@store')->name('reservation.store');
Route::get('/reservation/{Reservation}/show', 'ReservationController@show')->name('reservation.show');
Route::get('/reservation/{Reservation}/download', 'ReservationController@download')->name('reservation.download');
Route::get('/reservation/{Reservation}/print', 'ReservationController@print')->name('reservation.print');
Route::post('/reservation/find', 'ReservationController@find')->name('reservation.find');
//Update routes
Route::get('/reservation/{Reservation}/edit', 'ReservationController@edit')->name('reservation.edit');
Route::post('/reservation/{Reservation}/update', 'ReservationController@update')->name('reservation.update');
//confirm payment
Route::get('/payment/{PaymentConfirm}/confirm', 'ReservationController@confirm_payment_page')->name('reservation.create_payment_code');
Route::post('/payment/{PaymentConfirm}/confirm', 'ReservationController@payment_confirm')->name('reservation.payment_code');


Route::get('/reservation/{ReservationConfirm}/confirm', 'ReservationController@confirm_page')->name('reservation.create_confirm_code');
Route::post('/reservation/{ReservationConfirm}/confirm', 'ReservationController@confirm')->name('reservation.confirm_code');
//Route::get('/reservation/{reservation_slug}/cancel', 'ReservationCancelController@create')->name('reservation.cancel');
Route::get('/reservation_cancel/{ReservationCancel}/verify', 'ReservationCancelController@verify')->name('reservation.cancel_verify');
Route::post('/reservation_cancel/{ReservationCancel}/verify', 'ReservationCancelController@post_verify')->name('reservation.cancel_verify_post');
Route::get('/reservation/{reservation_slug}/cancel', 'ReservationCancelController@cancel_reserve')->name('reservation.cancel');
Route::get('/inspection_center/{inspection_center}/list', 'InspectionCenterController@list_reservations')->name('inspection_center.list');
Route::post('/discount_code/check', 'DiscountCodeController@check_code');


Auth::routes();

// admin pages
Route::group(['prefix' => 'admin','middleware' => 'admin' ], function () {
    Route::get('/reservations', 'ReservationController@index')->name('admin.reservation.index');
    Route::get('/', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/inspection_center/index', 'InspectionCenterController@index')->name('inspection_center.index');
    Route::post('/inspection_center/store', 'InspectionCenterController@store')->name('inspection_center.store');
    Route::get('/inspection_center/{inspection_center}/edit', 'InspectionCenterController@edit')->name('inspection_center.edit');
    Route::post('/inspection_center/{inspection_center}/update', 'InspectionCenterController@update')->name('inspection_center.update');
//    Route::get('/inspection_center/{inspection_center}/list', 'InspectionCenterController@list_reservations')->name('inspection_center.list');

    // capasity controller
    Route::get('/capacity_modification/{inspection_center_id}/{date}', 'CapacityModificationController@create')->name('capacity_modification.create');
    Route::post('/capacity_modification/{inspection_center_id}/{date}', 'CapacityModificationController@store')->name('capacity_modification.store');
    // DiscountCode controller
    Route::get('/discount_code/index', 'DiscountCodeController@index')->name('DiscountCode.index');
    Route::post('/discount_code/create', 'DiscountCodeController@store')->name('DiscountCode.store');
    Route::get('/discount_code/{DiscountCode}/delete', 'DiscountCodeController@destroy')->name('DiscountCode.delete');
    Route::get('/discount_code/{DiscountCode}/edit', 'DiscountCodeController@edit')->name('DiscountCode.edit');
    Route::post('/discount_code/{DiscountCode}/edit', 'DiscountCodeController@update')->name('DiscountCode.update');


    // cities controller
    Route::get('/city/index', 'CityController@index')->name('city.index');
    Route::post('/city/create', 'CityController@store')->name('city.store');
    Route::get('/city/{city}/delete', 'CityController@destroy')->name('city.delete');
    Route::get('/city/{city}/edit', 'CityController@edit')->name('city.edit');
    Route::post('/city/{city}/edit', 'CityController@update')->name('city.update');
    // car_type controller
    Route::get('/car_type/index', 'CarTypeController@index')->name('car_type.index');
    Route::post('/car_type/create', 'CarTypeController@store')->name('car_type.store');
    Route::get('/car_type/{carType}/delete', 'CarTypeController@destroy')->name('car_type.delete');
    Route::get('/car_type/{carType}/edit', 'CarTypeController@edit')->name('car_type.edit');
    Route::post('/car_type/{carType}/edit', 'CarTypeController@update')->name('car_type.update');
    // users controller
    Route::get('/user/index', 'AdminController@user_index')->name('user.index');
    Route::get('/setting/index', 'AdminController@setting')->name('setting.index');
    Route::post('/setting/{id?}', 'AdminController@setting_update')->name('setting.update');

});
