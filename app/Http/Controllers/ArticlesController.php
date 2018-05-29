<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;

use App\Articles;

class ArticlesController extends Controller
{
    public function index() {

        Cache::flush();

        $time = 24*60;

        $articles = Cache::remember('articles', $time, function() {
            return Articles::all();
        });
        return response()->json($articles);
    }
}
