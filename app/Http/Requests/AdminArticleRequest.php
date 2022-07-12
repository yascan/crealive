<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminArticleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'post' => 'required',
            'categories' => 'required',
            'seo_title' => 'max:255',
            'seo_description' => 'max:255'
        ];
    }
}
