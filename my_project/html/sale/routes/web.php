<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController; // 여기있는걸 이용하겠다
use App\Http\Controllers\GubunController; // 여기있는걸 이용하겠다
use App\Http\Controllers\ProductController;
use App\Http\Controllers\JangbuiController;
use App\Http\Controllers\JangbuoController;
use App\Http\Controllers\FindproductController;
use App\Http\Controllers\GiganController;
use App\Http\Controllers\BestController;
use App\Http\Controllers\CrosstabController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PictureController;
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

Route::get( 'member', [MemberController::class,'index']); // 경로 등록 
Route::resource( 'member', MemberController::class ); // 경로 등록 
Route::resource( 'gubun', GubunController::class ); // 경로 등록 

Route::get('product/jaego', [ProductController::class, 'jaego'] );
Route::resource('product', ProductController::class );
Route::resource('jangbui', JangbuiController::class );
Route::resource('jangbuo', JangbuoController::class );
Route::resource('findproduct', FindproductController::class );

Route::get('gigan/excel', [GiganController::class,'excel']);
Route::resource('gigan', GiganController::class );
Route::resource('best', BestController::class );
Route::resource('crosstab',CrosstabController::class );
Route::resource('chart',ChartController::class );

Route::post('login/check',[LoginController::class,'check']);
Route::get('login/logout',[LoginController::class,'logout']);

Route::resource('picture', PictureController::class);