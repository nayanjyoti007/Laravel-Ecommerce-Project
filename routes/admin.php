<?php

use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::group(['namespace' => 'Admin'], function () {

    Route::get('/admin/login', [IndexController::class, 'login'])->name('admin.login');
    Route::post('/admin/login-submit', [IndexController::class, 'loginSubmit'])->name('admin.login.submit');
    Route::get('/admin/logout', [IndexController::class, 'logout'])->name('admin.logout');

    // SLUG GENERATE
    Route::get('admin/generate-slug', [IndexController::class, 'slug'])->name('generate.slug');

    // BACKUP IMAGES
    Route::get('/admin/backup-images', [IndexController::class, 'backupImages'])->name('admin.backup.images');

    //CACHE CLEAR
    Route::get('/cache/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return back();
    })->name('admin.cache.clear');


    Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::get('/change-password', [ChangePasswordController::class, 'changePasswordForm'])->name('changePasswordForm');
        Route::post('/change-password-submit', [ChangePasswordController::class, 'changePassword'])->name('changePasswordSubmit');


        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::get('form/', [ProfileController::class, 'form'])->name('form');
            Route::post('submit', [ProfileController::class, 'submit'])->name('submit');
            Route::get('/change-password/{id}', [ProfileController::class, 'changepassword'])->name('changepassword');
            Route::post('change-password-submit', [ProfileController::class, 'changePasswordSubmit'])->name('changePasswordSubmit');
        });




















        // Start Routing Admin Role & Permission Syestem
        // Start Routing Admin Role & Permission Syestem

        // Route::group(['prefix' => 'master', 'middleware' => 'permission:manage.role'], function () {
        Route::group(['prefix' => 'master'], function () {


            Route::group(['prefix' => 'permission', 'as' => 'permission.'], function () {
                Route::get('all', [RoleController::class, 'allPermission'])->name('allPermission');
                Route::get('add', [RoleController::class, 'addPermission'])->name('addPermission');
                Route::post('store', [RoleController::class, 'storePermission'])->name('storePermission');
                Route::get('edit/{id}', [RoleController::class, 'editPermission'])->name('editPermission');
                Route::post('update', [RoleController::class, 'updatePermission'])->name('updatePermission');
                Route::get('delete', [RoleController::class, 'deletePermission'])->name('deletePermission');
            });

            Route::group(['prefix' => 'role', 'as' => 'role.'], function () {
                Route::get('all', [RoleController::class, 'allRole'])->name('allRole');
                Route::get('add', [RoleController::class, 'addRole'])->name('addRole');
                Route::post('store', [RoleController::class, 'storeRole'])->name('storeRole');
                Route::get('edit/{id}', [RoleController::class, 'editRole'])->name('editRole');
                Route::post('update', [RoleController::class, 'updateRole'])->name('updateRole');
                Route::get('delete', [RoleController::class, 'deleteRole'])->name('deleteRole');
            });

            Route::get('all/role/permission', [RoleController::class, 'allRolePermission'])->name('allRolePermission');
            Route::get('add/role/permission', [RoleController::class, 'addRolePermission'])->name('addRolePermission');
            Route::post('store/role/permission', [RoleController::class, 'storeRolePermission'])->name('storeRolePermission');
            Route::get('edit/role/permission/{id}', [RoleController::class, 'editRolePermission'])->name('editRolePermission');
            Route::post('update/role/permission/{id}', [RoleController::class, 'updateRolePermission'])->name('updateRolePermission');
            Route::get('delete/role/permission', [RoleController::class, 'deleteRolePermission'])->name('deleteRolePermission');


            Route::group(['prefix' => 'crateadmin', 'as' => 'crateadmin.'], function () {
                Route::get('list', [RoleController::class, 'list'])->name('list');
                Route::get('form/{id?}', [RoleController::class, 'form'])->name('form');
                Route::post('submit', [RoleController::class, 'submit'])->name('submit');
                Route::get('status/{id}', [RoleController::class, 'status'])->name('status');
                Route::get('delete', [RoleController::class, 'delete'])->name('delete');
            });
        });

        // End Routing Admin Role & Permission Syestem
        // End Routing Admin Role & Permission Syestem



    });
});
