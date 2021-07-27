<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/the-loai', [App\Http\Controllers\TheLoaiController::class, 'index']);
Route::post('/the-loai-them', [App\Http\Controllers\TheLoaiController::class, 'store']);
Route::post('/the-loai-sua', [App\Http\Controllers\TheLoaiController::class, 'update']);
Route::get('/the-loai-xoa/{id}', [App\Http\Controllers\TheLoaiController::class, 'destroy']);

Route::get('/truyen', [App\Http\Controllers\TruyenController::class, 'index']);
Route::get('/truyen-them', [App\Http\Controllers\TruyenController::class, 'create']);
Route::post('/truyen-them', [App\Http\Controllers\TruyenController::class, 'store']);
Route::get('/truyen-sua/{id}', [App\Http\Controllers\TruyenController::class, 'edit']);
Route::post('/truyen-sua', [App\Http\Controllers\TruyenController::class, 'update']);
Route::get('/truyen-xoa/{id}', [App\Http\Controllers\TruyenController::class, 'destroy']);

Route::get('/', [App\Http\Controllers\HomeController::class, 'trangchu']);
Route::get('/chi-tiet-truyen/{id}', [App\Http\Controllers\HomeController::class, 'chitiettruyen']);
Route::post('/tim-kiem-truyen', [App\Http\Controllers\HomeController::class, 'timkiemtruyen']);
Route::get('/loc/{id_theloai}', [App\Http\Controllers\HomeController::class, 'loc']);
