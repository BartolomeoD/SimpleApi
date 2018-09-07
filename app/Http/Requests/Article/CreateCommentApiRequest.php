<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class CreateCommentApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'text' => 'required|string|max:10000',
            'article_id' => 'required|exists:articles,id'
        ];
    }
}
