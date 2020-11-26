<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')->prefix('v1')->middleware('cors')->group(function () {
    Route::middleware('api.guard')->group(function () {
        //用户注册
        Route::post('/users', 'UserController@store')->name('users.store');
        //用户登录
        Route::post('/login', 'UserController@login')->name('users.login');

        Route::middleware('api.refresh')->group(function () {
            //当前用户信息
            Route::get('/users/info', 'UserController@info')->name('users.info');
            //用户列表
            Route::get('/users', 'UserController@index')->name('users.index');
            //用户信息
            Route::get('/users/{user}', 'UserController@show')->name('users.show');
            //用户退出
            Route::get('/logout', 'UserController@logout')->name('users.logout');
            // 活动
            Route::post('/activity/userInfo', 'ActivityController@getUserInfo')->name('activity.userInfo');
            Route::resource('activity', 'ActivityController');
            Route::post('/activity/list', 'ActivityController@list')->name('activity.list');
            // 材料
            Route::resource('material', 'MaterialController');
            Route::post('/material/apply', 'MaterialController@Setmaterials')->name('material.apply');
            // 邮箱
            Route::resource('mail', 'MailController');
            // 上传图片
            // Route::post('/activity/uploadImg','ActivityController@uploadImg')->name('activity.uploadImg');
            Route::post('/upload/file', 'FileController@upload')->name('upload');
            Route::post('/mail/send', 'MailController@sendMail')->name('mail.send');

            // 活动类型管理
            Route::resource('activityType', 'ActivityTypeController');
        });
    });
    // Route::middleware('admin.guard')->group(function () {
    //     //管理员登录
    //     Route::post('/admin/login', 'AdminController@login')->name('admins.login');
    //     Route::post('/upload/file', 'FileController@upload')->name('upload');
    //     Route::middleware('api.refresh')->group(function () {
    //         //下拉
    //         Route::get('options', 'OptionController@index')->name('options');
    //         //当前管理员信息
    //         Route::get('/admin/info', 'AdminController@info')->name('admins.info');
    //         //管理员退出
    //         Route::post('/admin/logout', 'AdminController@logout')->name('admins.logout');
    //         //资源路由
    //         Route::resource('rolelists', 'RolesController');
    //         Route::resource('permissions', 'PermissionsController');
    //         Route::resource('admin', 'AdminController');
    //         Route::resource('permissions-groups', 'PermissionsGroupController');
    //         Route::resource('admin-ip', 'AdminIpController');
    //         Route::resource('articles', 'ArticleController');
    //     });
    // });
});