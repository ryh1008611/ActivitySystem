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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/back', function () {
    \View::addExtension('html','php');
    echo  view()->file(public_path().'/dist/index.html');
});


Route::get('/form', function () {
    \View::addExtension('html','php');
    echo  view()->file(public_path().'/form-generator/dist/index.html');
});