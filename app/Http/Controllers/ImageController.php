<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Http\Resources\BookResource;

class ImageController extends Controller
{
    public function index()
    {
      return BookResource::collection(Book::all());
    }

    public function show(Book $book)
    {
        return new BookResource($book);
    }

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
}
