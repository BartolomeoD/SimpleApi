<?php

namespace App\Http\Controllers\Article;

use App\Http\Requests\Article\CreateCommentApiRequest;
use App\Http\Controllers\Controller;
use App\Services\ArticleService;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    private $articleService;

    public function __construct(ArticleService $articleService)
    {
        $this->articleService = $articleService;
    }

    public function create(CreateCommentApiRequest $request)
    {
        $article = $this->articleService->getById($request['article_id']);
        $user = Auth::guard()->user();
        $comment = $this->articleService->addComment($request['text'],$user, $article);
        return response()->json($comment);
    }
}
