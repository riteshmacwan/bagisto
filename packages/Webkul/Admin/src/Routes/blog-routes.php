<?php

use Illuminate\Support\Facades\Route;
use Webkul\Admin\Http\Controllers\Blog\BlogController;

/**
 * Blog routes.
 */
Route::group(['middleware' => ['admin'], 'prefix' => config('app.admin_url')], function () {
    Route::controller(BlogController::class)->prefix('blog')->group(function () {
        Route::get('/', 'index')->name('admin.blog.index');

        Route::get('create', 'create')->name('admin.blog.create');

        Route::post('create', 'store')->name('admin.blog.store');

        Route::get('edit/{id}', 'edit')->name('admin.blog.edit');

        Route::put('edit/{id}', 'update')->name('admin.blog.update');

        Route::delete('delete/{id}', 'delete')->name('admin.blog.delete');
    });
});
