<?php

namespace App\Http\Controllers;

use App\Articles;

class ArticlesController extends Controller
{
    public function index() {
        $articles = Articles::all();
        return response()->json($articles);
    }
}
