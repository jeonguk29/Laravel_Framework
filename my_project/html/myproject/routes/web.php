<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController; // 여기있는걸 이용하겠다
use App\Http\Controllers\GubunController; // 여기있는걸 이용하겠다
use App\Http\Controllers\ActionController; // 여기있는걸 이용하겠다
use App\Http\Controllers\OfficerController; // 여기있는걸 이용하겠다
use App\Http\Controllers\ChartController;
use App\Http\Controllers\BestController;
use App\Http\Controllers\VacationController;
use App\Http\Controllers\FindproductController;
use App\Http\Controllers\MainimgController;
use App\Http\Controllers\OfficervacationController;
use App\Http\Controllers\FindofficerController;
use App\Http\Controllers\LoginController;

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

Route::get('/', function () {
    return view('main');
});

Route::resource('member', MemberController::class);
Route::resource('gubun', GubunController::class);
Route::resource('action', ActionController::class);
Route::resource('officer', OfficerController::class);
Route::resource('chart', ChartController::class);
Route::resource('best', BestController::class);
Route::resource('vacation', VacationController::class);
Route::resource('findproduct', FindproductController::class );
Route::resource('mainimg', MainimgController::class );
Route::resource('officervacation', OfficervacationController::class );
Route::resource('findofficer', FindofficerController::class );

Route::post('login/check',[LoginController::class,'check']);
Route::get('login/logout',[LoginController::class,'logout']);

