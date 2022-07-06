<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        return view('admin.category.list', compact('categories'));
    }

    public function create(){
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        return view('admin.category.create', compact('categories'));
    }

    public function store(AdminCategoryRequest $request){
        $request['slug'] = Str::slug($request->name);
        $request['category_id'] = $request['category_id'] == 0 ? NULL : $request['category_id'];
        if (Category::create($request->only(['name', 'slug', 'seo_title', 'seo_description', 'category_id']))){
            return redirect()->route('admin.category.list');
        }
        return back()->withErrors(['error' => 'Kayıt işlemi sırasında hata oluştu'])->onlyInput('name','seo_title', 'seo_description');
    }

    public function edit($id){
        $categories = Category::whereNull('category_id')->with('childrenCategories')->get();
        $singleCategory = Category::find($id);
        return view('admin.category.update', compact('singleCategory', 'categories'));
    }

    public function update($id, AdminCategoryRequest $request){
        $category = Category::find($id);
        $request['slug'] = Str::slug($request->slug);
        $request['category_id'] = $category->id == $request->category_id ? $category->category_id : $request->category_id;
        if (Category::where('id', $category->id)->limit(1)->update([
            'name' => $request->input('name'),
            'slug' => $request->input('slug'),
            'seo_title' => $request->input('seo_title'),
            'seo_description' => $request->input('seo_description'),
            'category_id' => $request->input('category_id')
        ])){
            return redirect()->route('admin.category.list');
        }
        return back()->withErrors(['error' => 'Güncelleme işleminde hata oluştu']);
    }

    public function destroy($id){
        if (Category::destroy($id)){
            return redirect()->route('admin.category.list');
        }
        return back()->withErrors(['error' => 'Silme işleminde hata oluştu']);
    }

}
