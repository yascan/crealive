@extends('admin.layouts.app')
@section('title') Yazı ekle @endsection
@section('content')
    <div class="container">
        <div class="row mt-5 justify-content-md-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">Yazı ekle</div>
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
                        <form action="{{route('')}}" method="post">
                            @csrf
                            <label class="form-label">Kategori</label>
                            <div class="mb-3 overflow-scroll">
                                @foreach($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="categories{{$category->id}}" name="categories[]">
                                        <label class="form-check-label" for="categories{{$category->id}}">
                                            {{$category->name}}
                                        </label>
                                    </div>
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @includeIf('admin.article.child_category', ['child_category' => $childCategory])
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="mb-3">
                                <label for="title" class="form-label">Başlık</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="post" class="form-label">İçerik</label>
                                <textarea class="form-control" id="post" rows="6" name="post"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="seo_title" class="form-label">SEO Başlığı</label>
                                <input type="text" class="form-control" id="seo_title" name="seo_title">
                            </div>
                            <div class="mb-3">
                                <label for="seo_description" class="form-label">SEO Açıklaması</label>
                                <textarea class="form-control" id="seo_description" rows="3" name="seo_description"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
