<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::all();
        return view('admin.article.list', compact('articles'));
    }

    public function create(){
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        return view('admin.article.create', compact('categories'));
    }

    public function store(Request $request){
        dd($request);
    }
}
