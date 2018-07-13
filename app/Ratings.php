<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{

    protected $fillable = ['value', 'article_id'];

    public function article()
    {
        return $this->belongsTo(Articles::class);
    }
}
