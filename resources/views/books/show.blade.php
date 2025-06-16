@extends('layouts.app')

@section('content')
<h2>Chi tiết sách</h2>
<ul style="font-size: 16px;">
    <li><strong>Tên sách:</strong> {{ $book->bookName }}</li>
    <li><strong>Tác giả:</strong> {{ $book->author }}</li>
    <li><strong>Mô tả:</strong> {{ $book->description ?? 'Không có mô tả' }}</li>
</ul>

<a href="{{ route('books.index') }}" 
   style="margin-top: 15px; display: inline-block; background-color: #999; color: white; padding: 8px 12px; border-radius: 5px;">
   🔙 Quay lại
</a>
@endsection
