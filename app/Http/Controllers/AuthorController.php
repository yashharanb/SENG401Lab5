<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use App\Http\Resources\AuthorResource;

class AuthorController extends Controller
{
    public function index()
    {
      return AuthorResource::collection(Author::all());
    }

    public function store(Request $request, Author $author)
    {
        $author = Author::firstOrCreate(
            [
            'user_id' => $request->user()->id,
            'book_id' => $author->id,
            ],
            ['author' => $request->author]
        );

        return new AuthorResource($author);
    }

    public function show(Author $author)
    {
      return new AuthorResource($author);
    }

    public function __construct()
    {
      $this->middleware('auth:api')->except(['index', 'show']);
    }
}
