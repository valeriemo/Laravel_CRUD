<!-- Page index affiche tous les étudiants avec lien pour selectionner un étudiant et le un autre pour l'editer -->
@extends('layouts/master')

@section('content')
<div class="container typo">
    <div class="row">
        <section class="col-12 mb-1">
            <h1 class="card-header mb-3 display-3 text-center titre">@lang('lang.text-h1')</h1>
            <p class="sous-titre text-center">@lang('lang.texte')</p>
            <p class="display-4 sous-titre sous text-center">@lang('lang.sous-text')</p>
        </section>
        <div class="column text-center">
            <a class="btn btn-custom mx-auto" href="{{ route('registration') }}">@lang('lang.register')</a>
            <a class="btn btn-custom mx-auto" href="{{ route('login') }}">@lang('lang.login')</a>
        </div>

    </div>
</div>


@endsection