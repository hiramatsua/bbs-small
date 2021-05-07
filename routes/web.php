<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsEntryController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'auth'], function() {
    // 投稿一覧　ホーム画面
    Route::get('/home', [BbsEntryController::class, 'index'])->name('home');
    // 投稿登録
    Route::get('/create', [BbsEntryController::class, 'showCreateForm'])->name('create');
    Route::post('/create', [BbsEntryController::class, 'create']);
    // 投稿編集
    Route::get('/edit/{id}', [BbsEntryController::class, 'showEditForm'])->name('edit');
    Route::post('/edit/{id}', [BbsEntryController::class, 'edit']);
    // 投稿削除
    Route::get('/remove/{id}', [BbsEntryController::class, 'showRemoveForm'])->name('remove');
    Route::post('/remove/{id}', [BbsEntryController::class, 'remove']);
});

// Auth機能のルーティング
Auth::routes();
