@php $locale = session()->get('locale'); @endphp

@extends('layouts/master')
@section('content')
<div class="row mx-auto justify-content-center">
    <div class="col-md-20">
        <form action="{{ route('blog.update') }}" method="post">
            @method('put')
            @csrf
            <h1 class="card-header mb-3 display-4 text-center titre">
                @lang('lang.edit_article')
            </h1>
            <div class="form-body">
                @if($locale == 'fr')
                @include('layouts/blog-french-edit')
                @include('layouts/blog-english-edit')
                @else
                @include('layouts/blog-english-edit')
                @include('layouts/blog-french-edit')
                @endif
            </div>
            <div class="card-footer text-center">
                <input type="submit" value="@lang('lang.save')" class="btn btn-custom">
            </div>
        </form>

         <!-- Modal -->
         <div class="text-center mt-2">
            <button type="button" class="btn btn-custom-danger" data-bs-toggle="modal" data-bs-target="#deletemodal">
                @lang('lang.delete-msg')
            </button>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete-msg')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @lang('lang.delete-text') <span class="danger">{{$blog->titre}}</span> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">@lang('lang.no')</button>
                <form action="{{ route('blog.delete', $blog->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Effacer" class="btn btn-custom-danger">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection