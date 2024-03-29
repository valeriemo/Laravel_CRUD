@php $locale = session()->get('locale'); @endphp

@extends('layouts/master')
@section('content')

<div class="container d-flex justify-content-center">

    <div class="col-md-20">
        <form action="{{ route('file.update') }}" enctype="multipart/form-data" method="post">
            @method('put')
            @csrf
            <h1 class="card-header mb-3 display-4 text-center titre">
                @lang('lang.edit-file')
            </h1>
            <div class="form-body file">

            @if($locale == 'fr')
                <div class="mb-3">
                    <label for="nom">@lang('lang.new-file-name')</label>
                    <input type="text" name="nom" id="nom" value="{{$file->nom}}">
                    @if ($errors->has('nom'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom')}}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nom_en">@lang('lang.new-file-name-trans')</label>
                    <input type="text" name="nom_en" id="nom_en" value="{{$file->nom_en}}">
                    @if ($errors->has('nom_en'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom_en')}}
                    </div>
                    @endif
                </div>
            @else
                <div class="mb-3">
                    <label for="nom_en">@lang('lang.new-file-name')</label>
                    <input type="text" name="nom_en" id="nom_en" value="{{$file->nom_en}}">
                    @if ($errors->has('nom_en'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom_en')}}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nom">@lang('lang.new-file-name-trans')</label>
                    <input type="text" name="nom" id="nom" value="{{$file->nom}}">
                    @if ($errors->has('nom'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom')}}
                    </div>
                    @endif
                </div>
            @endif

                <input type="hidden" name="id" value="{{$file->id}}">
            </div>
            <div class="card-footer text-center">
                <input type="submit" value="@lang('lang.save')" class="btn btn-custom">
            </div>
        </form>
        <!-- Modal -->
        <div class="text-center mt-2">
            <button type="button" class="btn btn-custom-danger" data-bs-toggle="modal" data-bs-target="#deletemodal">
                @lang('lang.delete-file')
            </button>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('lang.delete-file')</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @lang('lang.delete-file-msg')<span class="danger">{{$file->nom}}</span> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">@lang('lang.no')</button>
                <form action="{{ route('file.delete', $file->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Effacer" class="btn btn-custom-danger">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection