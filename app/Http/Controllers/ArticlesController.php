<?php

namespace App\Http\Controllers;

use App\Articles;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{

    /**
     * @uses $_REQUEST['user_login']
     * @uses $_REQUEST['user_ip']
     * @uses $_REQUEST['title']
     * @uses $_REQUEST['content']
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function add(Request $request)
    {
        $user = Users::firstOrCreate([
            'user_login' => $request->get('user_login')
        ]);

        $article = Articles::create([
            'user_login' => $request->get('user_login'),
            'user_ip' => $request->get('user_ip'),
            'title' => $request->get('title'),
            'content' => $request->get('content'),
        ]);

        return response()->json($article, 201);
    }


    /**
     * @param $article_id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($article_id)
    {

        $article = Articles::where('article_id', '=', $article_id)->firstOrFail();

        return response()->json($article, 201);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function getTop(Request $request)
    {
        $topArticles = DB::select('SELECT
                                      a.article_id, a.user_ip, a.title, a.content,
                                      AVG((Cast(r.value AS FLOAT))) avg_rating
                                    FROM articles a
                                      JOIN ratings r USING (article_id)
                                    GROUP BY article_id
                                    ORDER BY avg_rating DESC
                                    LIMIT ?', [$request->get('limit')]);

        return response()->json($topArticles, 200);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsersIps()
    {
        $resultArray = [];

        $userInfoObj = DB::select('SELECT COUNT(*) AS count, user_ip, user_login FROM articles GROUP BY user_ip, user_login');

        foreach ($userInfoObj as $userInfoValues) {

            if ($userInfoValues->count > 1) {
                $resultArray[$userInfoValues->user_ip][] = $userInfoValues->user_login;
            }
        }

        return response()->json($resultArray, 200);
    }
}
