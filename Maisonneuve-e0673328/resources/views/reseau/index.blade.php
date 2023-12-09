<!-- Page index affiche tous les étudiants avec lien pour selectionner un étudiant et le un autre pour l'editer -->
@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Liste des étudiants</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Ville</th>
                            <th>Numéro de téléphone</th>
                            <th>Adresse mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($etudiants as $etudiant)
                            <tr>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->adresse }}</td>
                                <td>{{ $etudiant->ville_id }}</td>
                                <td>{{ $etudiant->date_naissance }}</td>
                                <td>{{ $etudiant->email }}</td>
                                <td>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection