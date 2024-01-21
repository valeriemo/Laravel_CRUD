@php $locale = session()->get('locale'); @endphp

@extends('layouts/master')
@section('content')
<div class="row mx-auto justify-content-center">
    <div class="col-md-20">
        <form action="{{ route('blog.store') }}" method="post">
            @csrf
            <h1 class="card-header mb-3 display-4 text-center titre">
                @lang('lang.create_article')
            </h1>
            <div class="form-body">
                @if($locale == 'fr')
                @include('layouts/blog-french')
                @include('layouts/blog-english')
                @else
                @include('layouts/blog-english')
                @include('layouts/blog-french')
                @endif
            </div>
                <div class="card-footer text-center">
                    <input type="submit" value="@lang('lang.save')" class="btn btn-custom">
                </div>
        </form>
    </div>
</div>
@endsection