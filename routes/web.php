<?php

use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['middleware'=>['guest']],function()
{
Route::get('/', function()
{
    return view('auth.login');
});
});


Route::group([
    'prefix' => \Mcamara\LaravelLocalization\Facades\LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' , 'auth' ]], function()
    {
        /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
        Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

        //=============GradeController=================

        Route::group(['namespace' => 'App\Http\Controllers\GradeController'], function()
        {
            Route::resource('grades', App\Http\Controllers\GradeController::class);
        });

        //==============ClassroomController============

        Route::group(['namespace' => 'App\Http\Controllers\ClassroomController'], function()
        {
            Route::resource('classrooms', App\Http\Controllers\ClassroomController::class);
            Route::post('delete_all', [App\Http\Controllers\ClassroomController::class,'delete_all'])->name('delete_all');
            Route::post('filter_classes', [App\Http\Controllers\ClassroomController::class,'filter_classes'])->name('filter_classes');
        });

        //====================SectionsController==============

        Route::group(['namespace' => 'App\Http\Controllers\SectionsController'], function()
        {
            Route::resource('sections', App\Http\Controllers\SectionsController::class);
            Route::get('classes/{id}', [App\Http\Controllers\SectionsController::class,'getclasses']);
        });

    });


