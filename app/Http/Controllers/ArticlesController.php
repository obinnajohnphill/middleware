<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

use App\Articles;


class ArticlesController extends Controller
{
    public function index() {

        $models = (array)Articles::all();
        $models = array_filter($models);
        if(empty($models))
        {
            Cache::flush();
            echo "Database is empty";
        }else{
            $time = 24*60;
            $articles = Cache::remember('articles', $time, function() {
                return Articles::all();
            });
            return response()->json($articles);
        }

    }
}
