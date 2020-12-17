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
        Route::post('/mail/sendCheckCode', 'MailController@sendCheckCode')->name('mail.sendCheckCode');
            // 发送验证码
        Route::middleware('api.refresh')->group(function () {
            //当前用户信息
            Route::get('/users/info', 'UserController@info')->name('users.info');
            //用户列表
            Route::get('/users', 'UserController@index')->name('users.index');
            Route::put('/users/update', 'UserController@update')->name('users.update');
            // 修改密码
            Route::put('/users/update-password', 'UserController@updatePassword')->name('users.password');
            //用户信息
            Route::get('/users/{user}', 'UserController@show')->name('users.show');
            //用户退出
            Route::get('/logout', 'UserController@logout')->name('users.logout');
            //修改用户状态
            Route::put('/users/status', 'UserController@updateStatus')->name('users.updateStatus');
            // 活动
            Route::post('/activity/userInfo', 'ActivityController@getUserInfo')->name('activity.userInfo');
            // 活动资源路由
            Route::resource('activity', 'ActivityController');

            // 获取我申请的活动
            // Route::post('/activity-list/apply', 'ActivityController@myApplyActivity')->name('activity.myActivity');
            // Route::post('/activity-list/join', 'ActivityController@myJoinActivity')->name('activity.myJoin');
            // 更改活动状态
            Route::post('/activity/list', 'ActivityController@list')->name('activity.list');
            Route::post('/activity/updateStatus', 'ActivityController@updateStatus')->name('activity.lupdateStatusist');
                // 更改轮播栏状态
            Route::post('/activity/updateRotation', 'ActivityController@updateRotation')->name('activity.updateRotation');
               // 更改资讯栏状态
            Route::post('/activity/updateInfomation', 'ActivityController@updateInfomation')->name('activity.updateInfomation');
            // 申请活动
            // 材料
            Route::resource('material', 'MaterialController');
            // 材料申请
            Route::post('/material/apply', 'MaterialController@Setmaterials')->name('material.apply');
            // 材料_活动
            Route::post('/activityMaterial/update/Info', 'ActivityMaterialController@updateMaterialInfo')->name('activityMaterial.update');
            Route::resource('activityMaterial', 'ActivityMaterialController');
            // 邮箱栏目
            // 邮箱
            Route::resource('mail', 'MailController');
            // 邮箱信息
            Route::post('/mail/Receive', 'EmailInfoController@Receive')->name('mail.Receive');
            // 邮箱信息字眼路由
            Route::post('/mail/sendUserGroup', 'MailController@sendUserGroup')->name('mail.sendUserGroup');
            // 群发邮箱
            Route::resource('emailInfo', 'EmailInfoController');
            // 上传图片
            // Route::post('/activity/uploadImg','ActivityController@uploadImg')->name('activity.uploadImg');
            Route::post('/upload/file', 'FileController@upload')->name('upload');
            Route::post('/mail/send', 'MailController@sendMail')->name('mail.send');

            // 活动类型管理
            Route::resource('activityType', 'ActivityTypeController');


            // 权限管理
            Route::resource('roles', 'RoleController');
            Route::resource('user-role', 'UserRoleController');
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