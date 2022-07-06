@extends('admin.layouts.app')
@section('title') Kategoriler @endsection
@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-md-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('admin.category.update', $singleCategory->id)}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Kategori Yolu</label>
                                <div id="categoryHelp" class="form-text">Mevcut kategoriyi, seçtiğiniz kategorinin altına taşıyabilirsiniz.</div>
                                <select class="form-select" size="10" aria-label="size 3 select example" name="category_id" aria-describedby="categoryHelp">
                                    @foreach ($categories as $category)
                                        <option {{$singleCategory->id == $category->id ? "selected" : ""}} value="{{$category->id}}">{{$category->name}}</option>
                                        @foreach ($category->childrenCategories as $childCategory)
                                            @includeIf('admin.category.create_child_category', ['child_category' => $childCategory])
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Kategori adı</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$singleCategory->name}}">
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">URL</label>
                                <input type="text" class="form-control" id="slug" name="slug" value="{{$singleCategory->slug}}">
                            </div>
                            <div class="mb-3">
                                <label for="seo_title" class="form-label">SEO Başlığı</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title" value="{{$singleCategory->seo_title}}">
                            </div>
                            <div class="mb-3">
                                <label for="seo_description" class="form-label">SEO Açıklaması</label>
                                <textarea class="form-control" id="seo_description" rows="3" name="seo_description">{{$singleCategory->seo_description}}</textarea>
                            </div>
                            <button type="submit" class="btn btn-dark">Güncelle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
