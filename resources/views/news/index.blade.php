@extends('layouts.news')

@section('title', 'Inicio')

@section('content')
    <div class="container-fluid col-11">
        <div class="row d-flex justify-content-center">
            @foreach ($posts as $post)
                @include('news.article-card')
            @endforeach
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@endsection
