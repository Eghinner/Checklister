<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Grupo de Rutas con autorizacion de usuario
Route::group(['middleware'=>'auth'],function(){
	Route::get('welcome', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
	Route::get('consultation', [\App\Http\Controllers\PageController::class, 'consultation'])->name('consultation');
// Grupo de Rutas Admin
	Route::name('admin.')->prefix('admin')->middleware('is_admin')->group(function(){
		Route::resource('pages', \App\Http\Controllers\Admin\PageController::class)->only(['edit', 'update']);
		Route::resource('checklist_groups', \App\Http\Controllers\Admin\ChecklistGroupController::class);
		Route::resource('checklist_groups.checklists', \App\Http\Controllers\Admin\ChecklistController::class);
		Route::resource('checklists.tasks', \App\Http\Controllers\Admin\TaskController::class);
		Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');
	});

});