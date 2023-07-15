<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function(){
    return view('home');
});
Route::get('/approval/request', function(){
    return view('requests');
});
Route::get('/approval/request/timeline', function(){
    return view('timeline');
});
Route::get('/approval/types', function(){
    return view('approval-types');
});
Route::get('/approval/flows', function(){
    return view('approval-flows');
});
Route::get('/approval/flows/create', function(){
    return view('approval-flows-create');
});
Route::get('/approval/flows/show', function(){
    return view('approval-flows-show');
});
