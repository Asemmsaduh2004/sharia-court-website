<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // عرض صفحة التحكم الخاصة بالأدمن
    public function adminIndex()
    {
        $images = GalleryImage::latest()->get();
        return view('admin.gallery', compact('images'));
    }

    // حفظ الصورة الجديدة
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'category' => 'required|in:buildings,facilities,tech,judiciary',
            'title' => 'nullable|string|max:255',
        ]);

        $path = $request->file('image')->store('gallery', 'public');

        GalleryImage::create([
            'title' => $request->title,
            'image_path' => $path,
            'category' => $request->category,
        ]);

        return back()->with('success', 'تم رفع الصورة بنجاح!');
    }

    // حذف الصورة
    public function destroy($id)
    {
        $image = GalleryImage::findOrFail($id);
        
        if (Storage::disk('public')->exists($image->image_path)) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return back()->with('success', 'تم حذف الصورة بنجاح!');
    }
}