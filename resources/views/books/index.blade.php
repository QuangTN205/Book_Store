@extends('layouts.app')

@section('content')
<h1 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">📚 Danh sách</h1>

<div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; margin-bottom: 20px;">
    <a href="{{ route('books.create') }}" 
       class="px-4 py-2 text-white rounded" 
       style="background-color: #35bfe6;">
        ➕ Thêm sách
    </a>

    <form action="{{ route('books.index') }}" method="GET" style="display: flex; gap: 10px;">
        <input type="text" name="search" placeholder="Tìm sách theo tên hoặc tác giả"
            value="{{ request('search') }}"
            style="padding: 8px; width: 250px; border: 1px solid #ccc; border-radius: 4px;">

        <select name="sort_by" style="padding: 8px; border-radius: 4px; border: 1px solid #ccc;">
            <option value="bookName_asc" {{ $sortBy == 'bookName_asc' ? 'selected' : '' }}>Tên sách A-Z</option>
            <option value="bookName_desc" {{ $sortBy == 'bookName_desc' ? 'selected' : '' }}>Tên sách Z-A</option>
            <option value="author_asc" {{ $sortBy == 'author_asc' ? 'selected' : '' }}>Tác giả A-Z</option>
            <option value="author_desc" {{ $sortBy == 'author_desc' ? 'selected' : '' }}>Tác giả Z-A</option>
            <option value="price_asc" {{ $sortBy == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
            <option value="price_desc" {{ $sortBy == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
        </select>

        <button type="submit"
            style="padding: 8px 12px; background-color: #35bfe6; color: white; border: none; border-radius: 4px;">
            🔍 Tìm
        </button>
    </form>
</div>

<table style="width: 100%; border-collapse: collapse; text-align: center;">
    <thead style="background-color: #f0f0f0;">
        <tr>
            <th style="border: 2px solid #999; padding: 12px;">STT</th>
            <th style="border: 2px solid #999; padding: 12px;">Tên sách</th>
            <th style="border: 2px solid #999; padding: 12px;">Tác giả</th>
            <th style="border: 2px solid #999; padding: 12px;">Giá</th>
            <th style="border: 2px solid #999; padding: 12px;"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $index => $book)
            <tr style="background-color: #ffffff;">
                <td style="border: 1px solid #ccc; padding: 10px;">{{ $index + 1 }}</td>
                <td style="border: 1px solid #ccc; padding: 10px;">{{ $book->bookName }}</td>
                <td style="border: 1px solid #ccc; padding: 10px;">{{ $book->author }}</td>
                <td style="border: 1px solid #ccc; padding: 10px;">{{ number_format($book->price, 0, ',', '.') }} đ</td>
                <td style="border: 1px solid #ccc; padding: 10px;">
                    <a href="{{ route('books.show', $book) }}" 
                       class="px-3 py-1 text-white rounded" 
                       style="background-color: #777bbb; margin-right: 5px;">
                        📖 Chi tiết
                    </a>

                    <a href="{{ route('books.edit', $book) }}" 
                       class="px-3 py-1 text-white rounded" 
                       style="background-color: #25dd2b; margin-right: 5px;">
                        ✏️ Sửa
                    </a>

                    <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="px-3 py-1 text-white rounded" 
                                style="background-color: #f63939">
                            🗑️ Xóa
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url('/dashboard') }}" 
   style="margin-top: 25px; display: inline-block; background-color: #999; color: white; padding: 10px 16px; border-radius: 5px; text-decoration: none;">
    🔙 Trở lại trang chủ
</a>
@endsection
