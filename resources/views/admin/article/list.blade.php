@extends('admin.layouts.app')
@section('title') Yazılar @endsection
@section('content')
    <div class="container">
        <div class="row">
            <a href="{{route('admin.article.create')}}"><button class="btn btn-success float-end">Yazı Ekle</button></a>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Başlık</th>
                        <th scope="col">İçerik</th>
                        <th scope="col">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <th scope="row">{{$article->id}}</th>
                            <td>{{$article->title}}</td>
                            <td>{{\Illuminate\Support\Str::words($article->post,7,'...')}}</td>
                            <td>
                                <a href=""><button class="btn btn-primary">Düzenle</button></a>
                                <a href=""><button class="btn btn-danger">Sil</button></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
