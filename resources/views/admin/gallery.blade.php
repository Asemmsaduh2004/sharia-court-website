<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم — إضافة صور للمعرض</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background-color: #f4f6f9; padding: 30px; direction: rtl; }
        .container { max-width: 900px; margin: 0 auto; background: #fff; padding: 25px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        h1 { color: #1B365D; margin-bottom: 20px; font-size: 24px; }
        .alert-success { background: #d4edda; color: #155724; padding: 12px; border-radius: 5px; margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        input[type="text"], select, input[type="file"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        .btn-submit { background-color: #1B365D; color: #fff; padding: 10px 25px; border: none; border-radius: 5px; font-weight: bold; cursor: pointer; margin-top: 10px; }
        .btn-submit:hover { background-color: #C5A059; }
        table { width: 100%; border-collapse: collapse; margin-top: 30px; }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: center; }
        th { background-color: #1B365D; color: white; }
        img.thumb { width: 80px; height: 60px; object-fit: cover; border-radius: 4px; }
        .btn-delete { background-color: #dc3545; color: white; border: none; padding: 6px 12px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>إضافة صورة جديدة للمعرض المصور</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>عنوان الصورة (اختياري):</label>
            <input type="text" name="title" placeholder="أدخل عنواناً وصفياً للصورة">
        </div>

        <div class="form-group">
            <label>تصنيف الصورة:</label>
            <select name="category" required>
                <option value="buildings">المباني</option>
                <option value="facilities">المرافق</option>
                <option value="tech">التقنية</option>
                <option value="judiciary">القضاء</option>
            </select>
        </div>

        <div class="form-group">
            <label>اختر الصورة:</label>
            <input type="file" name="image" accept="image/*" required>
        </div>

        <button type="submit" class="btn-submit">رفع الصورة</button>
    </form>

    <hr style="margin: 40px 0; border: 0; border-top: 1px solid #eee;">

    <h2>الصور المرفوعة حالياً</h2>
    <table>
        <thead>
            <tr>
                <th>الصورة</th>
                <th>العنوان</th>
                <th>التصنيف</th>
                <th>الإجراء</th>
            </tr>
        </thead>
        <tbody>
            @forelse($images as $img)
                <tr>
                    <td>
                        <img src="{{ \Illuminate\Support\Str::startsWith($img->image_path, 'http') ? $img->image_path : asset('storage/' . $img->image_path) }}" class="thumb">
                    </td>
                    <td>{{ $img->title ?? 'بدون عنوان' }}</td>
                    <td>
                        @if($img->category == 'buildings') المباني
                        @elseif($img->category == 'facilities') المرافق
                        @elseif($img->category == 'tech') التقنية
                        @elseif($img->category == 'judiciary') القضاء
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('admin.gallery.destroy', $img->id) }}" method="POST" onsubmit="return confirm('هل أنت تأكد من الحذف؟');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">لا توجد صور مرفوعة بعد.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
