<?php

use App\Http\Controllers\Admin\Brand\BrandController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\Category\SubSubCategoryController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\Product\ProductController;
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


        //Brand Routes
        Route::group(['prefix' => 'brand', 'as' => 'brand.'], function () {
            Route::get('list', [BrandController::class, 'list'])->name('list');
            Route::get('form/{id?}', [BrandController::class, 'form'])->name('form');
            Route::post('submit', [BrandController::class, 'submit'])->name('submit');
            Route::get('status/{id}', [BrandController::class, 'status'])->name('status');
            Route::get('delete', [BrandController::class, 'delete'])->name('delete');
        });

        //Category Routes
        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::get('list', [CategoryController::class, 'list'])->name('list');
            Route::get('form/{id?}', [CategoryController::class, 'form'])->name('form');
            Route::post('submit', [CategoryController::class, 'submit'])->name('submit');
            Route::get('status/{id}', [CategoryController::class, 'status'])->name('status');
            Route::get('delete', [CategoryController::class, 'delete'])->name('delete');
        });

        //SubCategory Routes
        Route::group(['prefix' => 'sub/category', 'as' => 'sub.category.'], function () {
            Route::get('list', [SubCategoryController::class, 'list'])->name('list');
            Route::get('form/{id?}', [SubCategoryController::class, 'form'])->name('form');
            Route::post('submit', [SubCategoryController::class, 'submit'])->name('submit');
            Route::get('status/{id}', [SubCategoryController::class, 'status'])->name('status');
            Route::get('delete', [SubCategoryController::class, 'delete'])->name('delete');
        });


    //Sub->SubCategory Routes
    Route::group(['prefix' => 'sub/sub/category', 'as' => 'sub.sub.category.'], function () {
        Route::get('list', [SubSubCategoryController::class, 'list'])->name('list');
        Route::get('form/{id?}', [SubSubCategoryController::class, 'form'])->name('form');
        Route::post('submit', [SubSubCategoryController::class, 'submit'])->name('submit');
        Route::get('status/{id}', [SubSubCategoryController::class, 'status'])->name('status');
        Route::get('delete', [SubSubCategoryController::class, 'delete'])->name('delete');
        Route::get('fetch-subcategory/{id}', [SubSubCategoryController::class, 'fetchSubCat'])->name('fetchSubCat');
    });


    // Product Routes
    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::get('add', [ProductController::class, 'addProduct'])->name('add');
        Route::get('fetch-subcategory/{id}', [ProductController::class, 'fetchSubCat'])->name('fetchSubCat');

        // Route::get('list', [ProductController::class, 'list'])->name('list');
        // Route::get('form/{id?}', [ProductController::class, 'form'])->name('form');
        // Route::post('submit', [ProductController::class, 'submit'])->name('submit');
        // Route::get('status/{id}', [ProductController::class, 'status'])->name('status');
        // Route::get('delete', [ProductController::class, 'delete'])->name('delete');
        // Route::get('fetch-subcategory/{id}', [ProductController::class, 'fetchSubCat'])->name('fetchSubCat');
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
