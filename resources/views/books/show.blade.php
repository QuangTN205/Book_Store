@extends('layouts.app')

@section('content')
<h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">📖 Chi tiết</h2>

<div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 0 8px rgba(0,0,0,0.1);">
    <ul style="list-style-type: none; padding: 0; font-size: 16px; line-height: 1.8;">
        <li><strong>📘 Tên sách:</strong> {{ $book->bookName }}</li>
        <li><strong>✍️ Tác giả:</strong> {{ $book->author }}</li>
        <li><strong>💰 Giá:</strong> {{ number_format($book->price, 0, ',', '.') }} VNĐ</li>
        <li><strong>📝 Nội dung:</strong> {{ $book->description ?? 'Không có mô tả' }}</li>
    </ul>

    <a href="{{ route('books.index') }}"
       style="margin-top: 20px; display: inline-block; background-color: #999; color: white; padding: 10px 16px; border-radius: 5px; text-decoration: none;">
        🔙 Quay lại danh sách
    </a>
</div>
@endsection

