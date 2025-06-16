<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $sortBy = $request->input('sort_by', 'bookName_asc'); // mặc định A-Z theo tên

        $query = Book::query();

        // Tìm kiếm theo tên sách hoặc tác giả
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('bookName', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
            });
        }

        // Sắp xếp theo lựa chọn
        switch ($sortBy) {
            case 'bookName_asc':
                $query->orderBy('bookName', 'asc');
                break;
            case 'bookName_desc':
                $query->orderBy('bookName', 'desc');
                break;
            case 'author_asc':
                $query->orderBy('author', 'asc');
                break;
            case 'author_desc':
                $query->orderBy('author', 'desc');
                break;
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;

        }

        $books = $query->get();

        return view('books.index', compact('books', 'search', 'sortBy'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bookName' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        Book::create($validated);

        return redirect()->route('books.index')->with('success', 'Book created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    $book = Book::findOrFail($id);
    return view('books.show', compact('book'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'bookName' => 'required|max:255',
            'author' => 'required|max:255',
            'price' => 'nullable|numeric|min:0',
            'description' => 'nullable|string',
        ]);

        $book->update($validated);

        return redirect()->route('books.index')->with('success', 'Book updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted!');
    }
}
