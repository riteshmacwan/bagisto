<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Test\TestController;

/**
 * Blog routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::controller(TestController::class)->prefix('test')->group(function () {
        Route::get('/', 'index')->name('admin.test.index');

        Route::get('create', 'create')->name('admin.test.create');

        Route::post('create', 'store')->name('admin.test.store');

        // Route::get('edit/{id}', 'edit')->name('admin.blog.edit');

        // Route::put('edit/{id}', 'update')->name('admin.blog.update');

        // Route::delete('edit/{id}', 'delete')->name('admin.blog.delete');

        // Route::post('mass-delete', 'massDelete')->name('admin.blog.mass_delete');
    });
});
