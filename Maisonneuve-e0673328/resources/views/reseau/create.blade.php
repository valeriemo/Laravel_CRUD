@extends('layouts/master')
@section('content')

    <div class="container typo">
        <div class="row">
            <div class="container d-flex justify-content-center">
                <form action="{{ route('etudiant.store')}}" method="post">
                @csrf
                <h1 class="card-header mb-3 display-4 text-center titre">
                    Créer un étudiant
                </h1>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="nom">Nom</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}">
                        @if ($errors->has('nom'))
                        <div class="text-danger-danger">
                            {{$errors->first('nom')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="adresse">Adresse</label>
                        <input id="adresse" name="adresse" class="form-control" value="{{ old('adresse') }}"></input>
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
                                <option value="{{ $ville->id }}" >{{$ville->ville}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telephone">Numéro de téléphone</label>
                        <input id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}"></input>
                        @if ($errors->has('telephone'))
                        <div class="text-danger-danger">
                            {{$errors->first('telephone')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email">Adresse mail</label>
                        <input id="email" name="email" class="form-control" value="{{ old('email') }}"></input>
                        @if ($errors->has('email'))
                        <div class="text-danger-danger">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance">Date de naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}"></input>
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
            </div>
        </div>
    </div>

@endsection