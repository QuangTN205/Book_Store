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

        <label for="description">Mô tả:</label>
        <textarea name="description">{{ old('description') }}</textarea><br>

        <button type="submit">Thêm sách</button>
    </form>
@endsection
