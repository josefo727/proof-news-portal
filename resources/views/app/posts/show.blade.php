@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                    <a href="{{ route('posts.index') }}" class="mr-4"><i class="icon ion-md-arrow-back"></i></a>
                    @lang('crud.posts.show_title')
                </h4>

                <div class="mt-4">
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.title')</h5>
                        <span>{{ $post->title ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.slug')</h5>
                        <span>{{ $post->slug ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.excerpt')</h5>
                        <span>{{ $post->excerpt ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.body')</h5>
                        <span>{{ $post->body ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.author_id')</h5>
                        <span>{{ optional($post->author)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.category_id')</h5>
                        <span>{{ optional($post->category)->name ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.published_at')</h5>
                        <span>{{ $post->published_at ?? '-' }}</span>
                    </div>
                    <div class="mb-4">
                        <h5>@lang('crud.posts.inputs.image')</h5>
                        <x-partials.thumbnail src="{{ $post->image }}" size="150" />
                    </div>
                </div>

                <div class="mt-4">
                    <a href="{{ route('posts.index') }}" class="btn btn-light">
                        <i class="icon ion-md-return-left"></i>
                        @lang('crud.common.back')
                    </a>

                    @can('create', App\Models\Post::class)
                        <a href="{{ route('posts.create') }}" class="btn btn-light">
                            <i class="icon ion-md-add"></i> @lang('crud.common.create')
                        </a>
                    @endcan
                </div>
            </div>
        </div>
    </div>
@endsection
