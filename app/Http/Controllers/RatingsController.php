<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Ratings;


class RatingsController extends Controller
{
    /**
     * @param $article_id
     * @param $rating_value
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function addRating($article_id, $rating_value)
    {

        Ratings::create(['value' => $rating_value, 'article_id' => $article_id]);

        return response()->json([(new Articles())->getAverage($article_id)], 201);
    }
}
