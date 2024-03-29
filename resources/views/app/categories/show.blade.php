@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">
                <a href="{{ route('categories.index') }}" class="mr-4"
                    ><i class="icon ion-md-arrow-back"></i
                ></a>
                @lang('crud.categor_as.show_title')
            </h4>

            <div class="mt-4">
                <div class="mb-4">
                    <h5>@lang('crud.categor_as.inputs.name')</h5>
                    <span>{{ $category->name ?? '-' }}</span>
                </div>
                <div class="mb-4">
                    <h5>@lang('crud.categor_as.inputs.slug')</h5>
                    <span>{{ $category->slug ?? '-' }}</span>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('categories.index') }}" class="btn btn-light">
                    <i class="icon ion-md-return-left"></i>
                    @lang('crud.common.back')
                </a>

                @can('create', App\Models\Category::class)
                <a
                    href="{{ route('categories.create') }}"
                    class="btn btn-light"
                >
                    <i class="icon ion-md-add"></i> @lang('crud.common.create')
                </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection
