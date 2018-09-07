<?php

namespace App\Services;


use App\Models\Article;
use App\Models\Comment;
use App\Models\User;

class ArticleService
{
    public function getById($id) {
        return Article::find($id);
    }

    /**
     * @param $title
     * @param $text
     * @param User $user
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($title, $text, User $user) {
        return $user->articles()->create([
            'title' => $title,
            'text' => $text
        ]);
    }

    /**
     * @return Article[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll() {

        return Article::with(['user','comments'])->get();
    }

    /**
     * @param $text
     * @param User $user
     * @param Article $article
     * @return Comment
     */
    public function addComment($text, User $user, Article $article) {
        $comment = new Comment();
        $comment->text = $text;
        $comment->article()->associate($article);
        $comment->user()->associate($user);
        $comment->save();
        return $comment;
    }
}