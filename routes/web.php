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


use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

//route index
Route::get('index',[
    'as'=>'page-index',
    'uses'=>'HomepageController@getIndex'
]);

//product type
Route::get('product-type/{cat}', [
    'as'=>'product-type',
    'uses'=>'HomepageController@getProductType'
]);

//product detail
Route::get('product-detail/{product_id}', [
    'as'=>'product-detail',
    'uses'=>'HomepageController@getProductDetail'
]);

//contact
Route::get('contact', [
    'as'=>'contact',
    'uses'=>'HomepageController@getContact'
]);

//about
Route::get('about', [
    'as'=>'about',
    'uses'=>'HomepageController@getAbout'
]);

//cart
Route::get('add-to-cart/{id}', [
   'as'=>'add-to-cart',
   'uses'=>'HomepageController@getAddtoCart'
]);

//delete cart
Route::get('delete-cart/{id}', [
   'as'=>'delete-cart',
    'uses'=>'HomepageController@getDeleteItemCart'
]);

//order
Route::post('orders', [
    'as'=>'order',
    'uses'=>'HomepageController@postCheckout'
]);

//login
Route::get('login', [
    'as'=>'login',
    'uses'=>'HomepageController@getLogin'
]);
Route::post('login', [
   'as'=>'login',
   'uses'=>'HomepageController@postLogin'
]);

//sign up
Route::get('signup', [
    'as'=>'signup',
    'uses'=>'HomepageController@getSignup'
]);
Route::post('signup', [
    'as'=>'signup',
    'uses'=>'HomepageController@postSignup'
]);

//log out
Route::get('logout', [
    'as'=>'logout',
    'uses'=>'HomepageController@postLogout'
]);

//search
Route::get('search', [
    'as'=>'search',
    'uses'=>'HomepageController@getSearch'
]);

//checkout
Route::get('order', [
    'as'=>'order',
    'uses'=>'HomepageController@getOrder'
]);
Route::post('order', [
    'as'=>'order',
    'uses'=>'HomepageController@postOrder'
]);

//send email
Route::get('send-mail',[
   'as'=>'send-email',
   'uses'=>'SendMailController@getSendEmail'
]);
Route::post('send-mail',[
    'as'=>'send-email',
    'uses'=>'HomepageController@postSendEmail'
]);

//verify customer order
Route::get('verify-order', [
    'as'=>'verify-order',
    'uses'=>'HomepageController@getVerifyOrder'
]);


//comment
Route::post('comment/{comment_id}', [
   'as'=>'comment',
   'uses'=>'CommentController@postComment'
]);
//model
    Route::get('model/save', function(){
        $user = new App\User();
        $user->name="Tinh";
        $user->email="Tinh@email";
        $user->password="abc123";
        $user->role_id=1;
        $user->save();
        echo 'Save successfully';
    });

?>
