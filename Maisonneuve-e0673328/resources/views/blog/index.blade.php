<!-- Page index affiche tous les étudiants avec lien pour selectionner un étudiant et le un autre pour l'editer -->
@extends('layouts/master')

@section('content')
<div class="container typo">
    <div class="row">
        <div class="col-12">
            <h1 class="card-header mb-3 display-4 text-center titre">@lang('lang.article_title')</h1>

            <table class="table table-hover custom_table table-custom-bg">
                <thead class="thead-dark head-custom">
                    <tr>
                        <th scope="col">@lang('lang.titre')</th>
                        <th scope="col">@lang('lang.contenu')</th>
                        <th scope="col">@lang('lang.auteur')</th>
                        <th scope="col">@lang('lang.date')</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($blogs as $blog)
                    <tr>
                        <td>{{ $blog->titre }}</td>
                        <td>{{ $blog->contenu }}</td>
                        <td>{{ $blog->blogHasUser->username }}</td>
                        <td>{{ $blog->date }}</td>
                        <td>
                            <a href="{{ route('blog.show', $blog->id) }}" class="btn btn-custom">@lang('lang.lire')</a>
                            <!-- Éditer dispo seulement si l'utilisateur est connecté et que l'utilisateur est l'auteur du blog -->
                            <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-custom">@lang('lang.edit')</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $blogs }}


@endsection