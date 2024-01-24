@php $locale = session()->get('locale'); @endphp

@extends('layouts/master')
@section('content')

<div class="container d-flex justify-content-center">

    <div class="col-md-20">
        <form action="{{ route('file.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <h1 class="card-header mb-3 display-4 text-center titre">
                @lang('lang.file_create')
            </h1>
            <div class="form-body file">
                @if($locale == 'fr')
                <div class="mb-3">
                    <label for="nom">@lang('lang.file-name')</label>
                    <input type="text" name="nom" id="nom">
                    @if ($errors->has('nom'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom')}}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nom_en">@lang('lang.file-name-trans')</label>
                    <input type="text" name="nom_en" id="nom_en">
                    @if ($errors->has('nom_en'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom_en')}}
                    </div>
                    @endif
                </div>
                @else
                <div class="mb-3">
                    <label for="nom_en">@lang('lang.file-name')</label>
                    <input type="text" name="nom_en" id="nom_en">
                    @if ($errors->has('nom_en'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom_en')}}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nom">@lang('lang.file-name-trans')</label>
                    <input type="text" name="nom" id="nom">
                    @if ($errors->has('nom'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom')}}
                    </div>
                    @endif
                </div>
                @endif
                <div class="mb-3">
                    <label for="file">@lang('lang.file-select')</label>
                    <input type="file" name="file" id="file" accept=".pdf, .zip, .doc">
                    @if ($errors->has('file'))
                    <div class="text-danger-danger">
                        {{$errors->first('file')}}
                    </div>
                    @endif
                </div>
            </div>
            <div class="card-footer text-center">
                <input type="submit" value="@lang('lang.save')" class="btn btn-custom">
            </div>
        </form>
    </div>
</div>
@endsection