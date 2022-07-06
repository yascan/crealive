<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id' =>'required|numeric',
            'name' => 'required|max:255',
            'seo_title' => 'max:255',
            'seo_description' => 'max:255'
        ];
    }
}
