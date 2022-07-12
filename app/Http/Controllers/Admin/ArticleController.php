<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminArticleRequest;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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

    public function store(AdminArticleRequest $request){
        $request['slug'] = Str::slug($request->title);
        $request['user_id'] = Auth::id();
        if (Article::create($request->only(['title', 'post', 'slug', 'user_id', 'seo_title', 'seo_description']))){
            return redirect()->route('admin.article.list');
        }
        return back()->withErrors(['error' => 'Kayıt işlemi sırasında hata oluştu'])->onlyInput('title','post', 'seo_title', 'seo_description');
    }

    public function edit($id){
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        $article = Article::find($id);
        return view('admin.article.update', compact('article', 'categories'));
    }
}
