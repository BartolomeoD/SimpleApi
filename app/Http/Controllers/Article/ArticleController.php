<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateArticleApiRequest;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private $articleService;
    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function create(CreateArticleApiRequest $request)
    {
        $user = Auth::guard()->user();
        $article = $this->articleService->create($request['title'], $request['text'], $user);
        return response()->json([$article],201);
    }

    public function getAll()
    {
        $articles = $this->articleService->getAll();
        return response()->json($articles, 200);
    }
}
