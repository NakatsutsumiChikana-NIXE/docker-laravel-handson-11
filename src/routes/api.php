<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/{no}/apparel', [App\Http\Controllers\TestController::class, 'apparelList'])->name('apparel');
// Route::get('/login', [App\Http\Controllers\TestController::class, 'login'])->name('login');
Route::get('/create', [App\Http\Controllers\TestController::class, 'create']);
// 作成
Route::post('/userCreate', [App\Http\Controllers\TestController::class, 'userCreate']);
// 更新
Route::post('/{id}/update', [App\Http\Controllers\TestController::class, 'update']);
// 削除
Route::post('/{id}/delete', [App\Http\Controllers\TestController::class, 'delete']);

// Route::middleware(['auth:sanctum', 'throttle:api'])->group(function () {
    Route::get('/login', [App\Http\Controllers\LoginController::class, 'login'])->name('login');
    // Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/storeList', [App\Http\Controllers\StoreListController::class, 'loggedIn'])->name('storeList');
    Route::get('/storeList', [App\Http\Controllers\StoreListController::class, 'storeList'])->name('storeList');
// });

Route::group(['prefix' => 'shop'], function () {
    Route::get('/{no}/clothesList', [App\Http\Controllers\ShopController::class, 'clothesList'])->name('apparel');
    Route::post('/cart', [App\Http\Controllers\ShopController::class, 'cart'])->name('cart');
    // 新規ユーザー作成
    Route::get('/newUser', [App\Http\Controllers\ShopController::class, 'newUser'])->name('newUser');
    // Route::post('/myPage', [App\Http\Controllers\ShopController::class, 'myPage'])->name('myPage');
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('/shop/registration', [App\Http\Controllers\Admin\ShopController::class, 'registration']);
    Route::post('/merchandise/registration', [App\Http\Controllers\Admin\MerchandiseController::class, 'registration']);
});
    // 店舗情報
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
