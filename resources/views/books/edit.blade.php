@extends('layouts.app')

@section('content')
    <h2>Sửa sách</h2>

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

    <form action="{{ route('books.update', $book) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="bookName">Tên sách:</label>
        <input type="text" name="bookName" value="{{ old('bookName', $book->bookName) }}"><br>

        <label for="author">Tác giả:</label>
        <input type="text" name="author" value="{{ old('author', $book->author) }}"><br>

        <label for="description">Mô tả:</label>
        <textarea name="description">{{ old('description', $book->description) }}</textarea><br>

        <button type="submit">Cập nhật sách</button>
    </form>
@endsection
