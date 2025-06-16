@extends('layouts.app')

@section('content')
<h1 style="font-size: 24px; font-weight: bold;">Danh sách sách</h1>

<div style="margin: 15px 0;">
    <a href="{{ route('books.create') }}" 
       class="px-4 py-2 text-white rounded" 
       style="background-color: #35bfe6;">
        ➕ Thêm sách

    </a>
    
    <form action="{{ route('books.index') }}" method="GET" style="margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Tìm sách theo tên hoặc tác giả"
            value="{{ request('search') }}"
            style="padding: 8px; width: 300px; border: 1px solid #ccc; border-radius: 4px;">
        <button type="submit"
            style="padding: 8px 12px; background-color: #35bfe6; color: white; border: none; border-radius: 4px;">
                🔍 Tìm
        </button>
    </form>
</div>

<table border="1" cellpadding="10" cellspacing="0" style="width: 100%; border-collapse: collapse; text-align: center;">
    <thead style="background-color: #f0f0f0;">
        <tr>
            <th style="border: 2px solid #999; padding: 12px; background-color: #f0f0f0;">STT</th>
            <th style="border: 2px solid #999; padding: 12px; background-color: #f0f0f0;">Tên sách</th>
            <th style="border: 2px solid #999; padding: 12px; background-color: #f0f0f0;">Tác giả</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $index => $book)
            <tr class="items-center">
                <td>{{ $index + 1 }}</td>
                <td>{{ $book->bookName }}</td>
                <td>{{ $book->author }}</td>
                <td>
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

                    <a href="{{ route('books.show', $book) }}" 
                    class="px-3 py-1 text-white rounded" 
                    style="background-color: #777bbb; margin-right: 5px;">
                        📖 Chi tiết
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

