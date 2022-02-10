<?php
use App\Http\Controllers\ScheduleController;


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

Route::group(['middleware' => ['auth']], function(){
    Route::get('/', function () {
        // dd(1); 
        return view('calendar');
    });    
    Route::get('/schedules/itiran', 'ScheduleController@itiran');
    Route::post('/schedule-add', 'ScheduleController@scheduleAdd');
    Route::get('/schedule-get', 'ScheduleController@scheduleGet');
    Route::get('/schedules/sankasya/{schedule}', 'ScheduleController@register');
    Route::get('/sankasya','UserController@sankasya');
    Route::post('/store/{schedule}', 'ScheduleController@store');

});

Route::get('/home', 'HomeController@index')->name('home');

