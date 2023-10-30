<?php

namespace App\Http\Controllers;

use App\Filters\BookFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $size = 15;
        if ($request->filled('size')) {
            $size = $request->size;
        }

        $filter = new BookFilter();
        $filterItems = $filter->transform($request);

        if (count($filterItems) == 0) {
            $notes = Book::orderBy('updated_at', 'desc')->paginate($size);
            return new BookCollection($notes->appends($request->query()));
        } else {
            $notes = Book::where($filterItems)->orderBy('updated_at', 'desc')->paginate($size);
            return new BookCollection($notes->appends($request->query()));
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBooksRequest $request)
    {
        return Book::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $note)
    {
        return new BookResource($note);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBooksRequest $request, Book $note)
    {
        return $note->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Book::destroy($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function search(string $searchKey)
    {
        return new BookCollection(Book::where('header', 'like', "%{$searchKey}%")->orWhere('author', 'like', "%{$searchKey}%")->orderBy('updated_at', 'desc')->paginate());
    }
    
}