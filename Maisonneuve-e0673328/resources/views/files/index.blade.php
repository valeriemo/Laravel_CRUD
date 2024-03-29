@extends('layouts/master')

@section('content')
<div class="container typo">
    <div class="row">
        <div class="col-12">
            <h1 class="card-header mb-3 display-4 text-center titre">@lang('lang.files_title')</h1>
            <a class="btn btn-custom mb-3" href="{{route('file.create')}}">@lang('lang.file_create')</a>
            <table class="table table-hover custom_table table-custom-bg">
                <thead class="thead-dark head-custom">
                    <tr>
                        <th scope="col">@lang('lang.titre')</th>
                        <th scope="col">@lang('lang.auteur')</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($files as $file)
                    <tr>
                        <td><a href="{{$file->path}}">{{ $file->nom }}</a></td>
                        <td>{{ $file->fileHasUser->username }}</td>
                        <td>
                            <!-- Éditer dispo seulement si l'utilisateur est connecté et que l'utilisateur est l'auteur du blog -->
                            @if(Auth::check() && Auth::user()->id == $file->fileHasUser->id)
                            <a href="{{ route('file.edit', $file->id) }}" class="btn btn-custom">@lang('lang.edit')</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $files }}


@endsection