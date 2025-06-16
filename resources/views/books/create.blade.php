@extends('layouts.app')

@section('content')
    <h2>Thêm sách mới</h2>

    @if ($errors->any())
        <div>
            <strong>Lỗi:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <label for="bookName">Tên sách:</label>
        <input type="text" name="bookName" value="{{ old('bookName') }}"><br>

        <label for="author">Tác giả:</label>
        <input type="text" name="author" value="{{ old('author') }}"><br>

        <label for="price">Giá (VNĐ):</label>
        <input type="number" name="price" step="0.01" value="{{ old('price') }}"><br>

        <label for="description">Mô tả:</label>
        <textarea name="description">{{ old('description') }}</textarea><br>

        <button
            class="px-4 py-2 text-white rounded" 
            style="background-color: #35bfe6;"
            type="submit">Thêm sách</button>
    </form>
@endsection
