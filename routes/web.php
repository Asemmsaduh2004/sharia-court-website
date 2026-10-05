<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Models\GalleryImage;

// 1. مسار الصفحة الرئيسية للمستخدمين
Route::get('/', function () {
    $galleryImages = GalleryImage::latest()->get();
    return view('welcome', compact('galleryImages'));
});

// 2. مسارات لوحة تحكم الأدمن للصور
Route::get('/admin/gallery', [GalleryController::class, 'adminIndex'])->name('admin.gallery.index');
Route::post('/admin/gallery', [GalleryController::class, 'store'])->name('admin.gallery.store');
Route::delete('/admin/gallery/{id}', [GalleryController::class, 'destroy'])->name('admin.gallery.destroy');