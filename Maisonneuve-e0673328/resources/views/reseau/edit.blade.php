@extends('layouts/master')
@section('content')

<div class="container">
    <div class="row">
        <div class="container d-flex justify-content-center">
            <form method="post">
                @method('put')
                @csrf
                <h1 class="card-header mb-3 display-4 text-center titre">
                    Éditer l'étudiant
                </h1>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="{{$etudiant->nom}}">
                        @if ($errors->has('nom'))
                        <div class="text-danger-danger">
                            {{$errors->first('nom')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="adresse">Adresse</label>
                        <input id="adresse" name="adresse" class="form-control" value="{{$etudiant->adresse}}"></input>
                        @if ($errors->has('adresse'))
                        <div class="text-danger-danger">
                            {{$errors->first('adresse')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="body">Ville</label>
                        <select id="ville_id" name="ville_id" class="form-control">
                            @foreach($villes as $ville)
                            <option value="{{ $ville->id }}">{{$ville->nom}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telephone">Numéro de téléphone</label>
                        <input id="telephone" name="telephone" class="form-control" value="{{$etudiant->telephone}}"></input>
                        @if ($errors->has('telephone'))
                        <div class="text-danger-danger">
                            {{$errors->first('telephone')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email">Adresse mail</label>
                        <input id="email" name="email" class="form-control" value="{{$etudiant->email}}"></input>
                        @if ($errors->has('email'))
                        <div class="text-danger-danger">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{$etudiant->date_naissance}}"></input>
                        @if ($errors->has('date_naissance'))
                        <div class="text-danger-danger">
                            {{$errors->first('date_naissance')}}
                        </div>
                        @endif
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" value="Sauvegarder" class="btn btn-custom">
                    </div>
            </form>
            <div class="text-center mt-2">
                <button type="button" class="btn btn-custom-danger" data-bs-toggle="modal" data-bs-target="#deletemodal">
                    Effacer cet étudiant
                </button>
            </div>

        </div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer l'étudiant</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous certain de bien vouloir effacer <span class="danger">{{$etudiant->nom}}</span> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Non</button>
                <form action="{{ route('etudiant.delete', $etudiant->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Effacer" class="btn btn-custom-danger">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection