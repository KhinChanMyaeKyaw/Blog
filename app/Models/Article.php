<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function category()
    {
        // return Article->belongsTo->Category;
        return $this->belongsTo('App\Models\Category');
        // This return gets category model.
    }

    public function user()
    {
        // return Article->belongsTo->Category;
        return $this->belongsTo('App\Models\User');
        // This return gets category model.
    }

    public function comments()
    {
        // return Article->hasMany->Comment;
        return $this->hasMany('App\Models\Comment');
    }
}

// Performance of Article Model
// Article::all();
// Article::find(1);
// $article= new Article;
// $article->save();
// $article->category();
