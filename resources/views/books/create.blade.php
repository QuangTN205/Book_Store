@extends('layouts.app')

@section('content')
<h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">📚 Thêm sách mới</h2>

@if ($errors->any())
    <div style="background-color: #ffe0e0; padding: 10px; border: 1px solid red; border-radius: 5px; margin-bottom: 20px;">
        <strong>Lỗi:</strong>
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div style="max-width: 600px; margin: 0 auto;">
    <form action="{{ route('books.store') }}" method="POST" style="display: flex; flex-direction: column; gap: 15px;">
        @csrf

        <div>
            <label for="bookName" style="font-weight: bold;">Tên sách:</label><br>
            <input type="text" name="bookName" value="{{ old('bookName') }}"
                   style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
        </div>

        <div>
            <label for="author" style="font-weight: bold;">Tác giả:</label><br>
            <input type="text" name="author" value="{{ old('author') }}"
                   style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
        </div>

        <div>
            <label for="price" style="font-weight: bold;">Giá (VNĐ):</label><br>
            <input type="number" name="price" step="1000" min="0" value="{{ old('price') }}"
                   style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
        </div>

        <div>
            <label for="description" style="font-weight: bold;">Nội dung:</label><br>
            <textarea name="description" rows="4"
                      style="width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc;">{{ old('description') }}</textarea>
        </div>

        <div style="display: flex; justify-content: space-between;">
            <button type="submit"
                    style="background-color: #35bfe6; color: white; padding: 10px 20px; border: none; border-radius: 4px;">
                ➕ Thêm sách
            </button>

            <a href="{{ route('books.index') }}"
               style="background-color: #999; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">
                🔙 Quay lại
            </a>
        </div>
    </form>
</div>
@endsection
