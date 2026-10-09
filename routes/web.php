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

// 3. مسار التهيئة وتجهيز مجلدات رفع الصور
Route::get('/run-migrations', function () {
    \Illuminate\Support\Facades\Artisan::call('migrate:fresh --seed');
    \Illuminate\Support\Facades\Artisan::call('storage:link');

    // إنشاء مجلدات رفع الصور المؤقتة والمؤكدة تلقائياً مع إعطائها صلاحيات الكتابة
    $paths = [
        storage_path('app/public/gallery'),
        storage_path('app/livewire-tmp'),
    ];

    foreach ($paths as $path) {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }

    return 'Database migrated, storage linked & directories created successfully!';
});
