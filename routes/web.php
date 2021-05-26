<?php

use Illuminate\Support\Facades\Route;

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
		Route::resource('checklist_groups', \App\Http\Controllers\Admin\ChecklistGroupController::class);
		Route::resource('checklist_groups.checklists', \App\Http\Controllers\Admin\ChecklistController::class);
		Route::resource('checklists.tasks', \App\Http\Controllers\Admin\TaskController::class);
	});

});