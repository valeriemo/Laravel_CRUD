@extends('layouts/master')
@section('content')

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center display-5 titre">@lang('lang.profil')</h1>
                    <h3 class="card-title">{{ $etudiant->nom }}</h3>
                    <p class="card-text">{{ $etudiant->adresse }}</p>
                    <p class="card-text">{{ $etudiant->etudiantHasVille->ville }}</p>
                    <p class="card-text">{{ $etudiant->telephone }}</p>
                    <p class="card-text">{{ $etudiant->date_naissance }}</p>
                    <p class="card-text"><strong>{{ $etudiant->etudiantHasUser->username }}</strong></p>
                    <p class="card-text">{{ $etudiant->etudiantHasUser->email }}</p>
                    <div class="d-flex justify-content-center">
                        <a href="{{ route('user.edit', $etudiant->id) }}" class="mx-3 btn btn-custom-success">@lang('lang.edit')</a>
                        <form action="{{ route('user.delete', $etudiant->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-custom-danger ml-2">@lang('lang.delete')</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection