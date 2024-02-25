@extends('layouts.news')

@section('title', $post->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <article class="mb-4">
                    @if ($post->image)
                        <img src="{{ $post->image }}" class="mb-3 card-img-top" alt="{{ $post->title }}">
                    @endif
                    <header class="mb-3">
                        <h1>{{ $post->title }}</h1>
                        <div class="text-muted">
                            <small>Por: {{ $post->author->name ?? 'Autor Desconocido' }}</small> |
                            <small>Publicado: {{ $post->published_at->format('d M, Y') }}</small>
                        </div>
                    </header>
                    <section class="article-body">
                        {!! nl2br(e($post->body)) !!}
                    </section>
                </article>
                <a href="{{ url('/') }}" class="btn btn-secondary">&laquo; Volver al inicio</a>
            </div>
        </div>
        <div class="mt-4 row">
            <div class="col-md-11">
                <h2>Noticias relacionadas</h2>
                <div class="d-flex justify-content-center">
                    @foreach ($posts as $post)
                        <div class="col-12 col-md-6 col-lg-4">
                            @include('news.article-preview')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
