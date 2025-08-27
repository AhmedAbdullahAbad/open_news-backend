<?php

declare(strict_types=1);

use App\Http\Controllers\API\v1\Admins\Auth\LoginController;
use App\Http\Controllers\API\v1\Admins\Categories\IndexCategoryController;
use App\Http\Controllers\API\v1\Admins\Categories\StoreCategoryController;
use App\Http\Controllers\API\v1\Admins\News\IndexNewsController;
use App\Http\Controllers\API\v1\Admins\News\StoreNewsController;
use Illuminate\Support\Facades\Route;

Route::prefix('/auth')->group(function (): void {
    Route::post('/login', LoginController::class);
});

Route::middleware(['auth:admin-api'])->group(function (): void {

    Route::name('categories.')->prefix('categories')->group(function (): void {
        Route::get(
            '/',
            IndexCategoryController::class
        )->name('index');

        Route::post(
            '/',
            StoreCategoryController::class
        )->name('store');
    });

    Route::name('news.')->prefix('news')->group(function (): void {
        Route::get(
            '/',
            IndexNewsController::class
        )->name('index');

        Route::post(
            '/',
            StoreNewsController::class
        )->name('store');
    });
});
