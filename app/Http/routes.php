<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('login','LoginController@checklogin');

Route::get('register',function(){
    return View::make('Member.register');
});

Route::get('forgot',function(){
    return View::make('Member.forgotpass');
});

Route::get('dashboard',function(){
    return View::make('Member.dashboard');
});

Route::get('bank',function(){
    return View::make('Member.bank');
});

//Post Login
Route::post('register','LoginController@register');
Route::post('login','LoginController@login');
Route::post('forgot','Sendmail@sendEmailReminder');

//Logout
Route::get('logout','LoginController@logout');

//ทดสอบ logout
Route::get('getuser',function(){
    echo Auth::user()->email;
});

//ส่งข้อมูลไปที่ view
Route::get('post',function(){
    $continent = 'aaa';
    return View::make('Member.Login')->with('continents',$continent);
});


/*Route::get('/', function () {
    //return view('welcome');
    return View::make('Member.dashboard');
});*/


//check before load
Route::get('/', ['middleware' => 'auth', function() {
    // Only authenticated users may enter...
    return View::make('Member.dashboard');
}]);


Route::get('check-connect',function(){
 if(DB::connection()->getDatabaseName())
 {
 return "Yes! successfully connected to the DB: " . DB::connection()->getDatabaseName();
 }else{
 return 'Connection False !!';
 }
 
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/