<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    public function index()
    {
      return BookResource::collection(Book::all());
    }

    public function show(Book $book)
    {
      return new BookResource($book);
    }

    public function image(Book $book){
      return '<img src='.$book->image.'>';
    }

    public function isbn($isbn){
      $book = Book::where('ISBN', $isbn)->first();
      return new BookResource($book);
    }

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show', 'image', 'isbn']);
    }

}
