<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController; // لا تنس استدعاء متحكم المصادقة
use App\Http\Controllers\CategoryController;




Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout']);



Route::middleware(['auth'])->group(function () {
    Route::get('/getProducts', [ProductController::class, 'getProducts']);
    Route::get('/viewForm', [ProductController::class, 'viewForm']);
    Route::post('/addProduct', [ProductController::class, 'addProduct']);
    Route::get('/editProduct/{product}', [ProductController::class, 'editProduct']);
    Route::post('/updateProduct/{product}', [ProductController::class, 'updateProduct']);
    Route::post('/deleteProduct/{product}', [ProductController::class, 'deleteProduct']);

    Route::get('/getCategories', [CategoryController::class, 'getCategories']);
    Route::get('/viewCategoryForm', [CategoryController::class, 'viewForm']);
    Route::post('/addCategory', [CategoryController::class, 'addCategory']);
    Route::get('/editCategory/{category}', [CategoryController::class, 'editCategory']);
    Route::post('/updateCategory/{category}', [CategoryController::class, 'updateCategory']);
    Route::post('/deleteCategory/{category}', [CategoryController::class, 'deleteCategory']);
});

Route::get('/', function () {
    return redirect('/login');
});