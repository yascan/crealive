@extends('admin.layouts.app')
@section('title') Kategoriler @endsection
@section('content')
    <style>
        .categoryList{
            list-style: none;
            border-bottom: 1px solid #c9c9c9;
            margin-top: 10px;
        }
        .btn-update{
            text-decoration: none;
            color: #020202;
            margin-right: 10px;
        }
        .btn-delete {
            text-decoration: none;
            color: #cd0000;
            margin-right: 10px;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <a href="{{route('admin.category.create')}}"><button class="btn btn-success float-end">Kategori Ekle</button></a>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Kategoriler</div>
                    <div class="card-body">
                        <ul class="">
                            @foreach ($categories as $category)
                                <li class="categoryList">
                                    {{ $category->name }}
                                    <a class="float-end btn-delete" href="{{route('admin.category.delete', $category->id)}}">Sil</a>
                                    <a class="float-end btn-update" href="{{route('admin.category.edit', $category->id)}}">Düzenle</a>
                                </li>
                                <ul class="">
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @includeIf('admin.category.child_category', ['child_category' => $childCategory])
                                    @endforeach
                                </ul>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
