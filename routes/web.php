<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Grupo de Rutas con autorizacion simple
Route::group(['middleware'=>'auth'],function(){
// Grupo de Rutas con autorizacion compleja(Admin)
	Route::name('admin.')->prefix('admin')->middleware('is_admin')->group(function(){
		Route::resource('pages', \App\Http\Controllers\Admin\PageController::class);
	});

});