<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $primaryKey = 'article_id';
    protected $fillable = ['user_login', 'user_ip', 'title', 'content'];

    public function user()
    {
        return $this->belongsTo(Users::class);
    }

    public function ratings()
    {
        return $this->hasMany(Ratings::class);
    }

    public function getAverage(int $articleId)
    {
        return Ratings::where('article_id', $articleId)
            ->avg('value');
    }
}
