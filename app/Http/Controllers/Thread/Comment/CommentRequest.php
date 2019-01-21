<?php


namespace App\Http\Controllers\Thread\Comment;


use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'content' => 'required|max:255'
        ];

    }
}