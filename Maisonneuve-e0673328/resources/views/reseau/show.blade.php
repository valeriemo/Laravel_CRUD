@extends('layouts/master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="card-header mb-3 display-4 text-center titre">Etudiant</h1>
            <div class="card">
                <div class="card-header">
                    Informations sur l'étudiant
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $etudiant->nom }}</h5>
                    <p class="card-text">
                        <strong>Adresse:</strong> {{ $etudiant->adresse }}<br>
                        <strong>Ville:</strong> {{ $etudiant->ville_id }}<br>
                        <strong>Numéro de téléphone:</strong> {{ $etudiant->date_naissance }}<br>
                        <strong>Adresse mail:</strong> {{ $etudiant->email }}
                    </p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-primary">Editer</a>
                <a href="{{route('etudiant.index')}}" class="btn btn-primary">Retour à la liste</a>
            </div>

        </div>
    </div>
</div>

@endsection