<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    public function user()
    {
        // return Article->belongsTo->Category;
        return $this->belongsTo('App\Models\User');
        // This return gets category model.
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Article');


    }


}
