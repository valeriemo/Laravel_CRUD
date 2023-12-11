@extends('layouts/master')
@section('content')

    <div class="container">
        <div class="row">
            <div class="container d-flex justify-content-center">
                <form action="{{ route('etudiant.store')}}" method="post">
                @csrf
                <h1 class="card-header mb-3 display-4 text-center">
                    Créer un étudiant
                </h1>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="adresse">Adresse</label>
                        <input id="adresse" name="adresse" class="form-control"></input>
                    </div>
                    <div class="mb-3">
                        <label for="body">Ville</label>
                        <select id="ville_id" name="ville_id" class="form-control">
                            @foreach($villes as $ville)
                                <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telephone">Numéro de téléphone</label>
                        <input id="telephone" name="telephone" class="form-control"></input>
                    </div>
                    <div class="mb-3">
                        <label for="email">Adresse mail</label>
                        <input id="email" name="email" class="form-control"></input>
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance">Date de naissance</label>
                        <input id="date_naissance" name="date_naissance" class="form-control"></input>
                    </div>

                <div class="card-footer text-right">
                        <input type="submit" value="Sauvegarder" class="btn btn-success">
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection