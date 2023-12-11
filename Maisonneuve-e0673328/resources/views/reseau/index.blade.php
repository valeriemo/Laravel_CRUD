<!-- Page index affiche tous les étudiants avec lien pour selectionner un étudiant et le un autre pour l'editer -->
@extends('layouts/master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="card-header mb-3 display-4 text-center titre">Liste des étudiants<span class="emoji">👫</span> </h1>

                <table class="table table-hover custom_table ">
                    <thead class="thead-dark ">
                        <tr class="bg-custom">
                            <th scope="col">Nom</th>
                            <th scope="col">Adresse</th>
                            <th scope="col">Ville</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Adresse mail</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($etudiants as $etudiant)
                            <tr>
                                <td>{{ $etudiant->nom }}</td>
                                <td>{{ $etudiant->adresse }}</td>
                                <td>{{ $etudiant->ville->nom }}</td>
                                <td>{{ $etudiant->date_naissance }}</td>
                                <td>{{ $etudiant->email }}</td>
                                <td>
                                    <a href="{{ route('etudiant.show', $etudiant->id) }}" class="btn btn-primary">Voir</a>
                                    <a href="{{ route('etudiant.edit', $etudiant->id) }}" class="btn btn-primary">Editer</a>
                                    <a href="" class="btn btn-primary mt-2">Supprimer</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection