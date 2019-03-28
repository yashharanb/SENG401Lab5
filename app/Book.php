<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function authors()
    {
      return $this->hasMany(Author::class);
    }

    protected $fillable = ['name', 'ISBN', 'author', 'publicationYear', 'publisher', 'image', 'subscriptionStatus'];
}
