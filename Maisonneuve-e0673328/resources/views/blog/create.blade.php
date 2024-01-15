@extends('layouts/master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <form action="{{ route('registration') }}" method="post">
                @csrf
                <h1 class="card-header mb-3 display-4 text-center titre">
                    Composer un article
                </h1>
                <div class="cart-body row">
                    <div class="col-md-6">
                        <h2>Version Francaise</h2>
                        <div class="mb-3">
                            <label for="titre">Titre</label>
                            <input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre') }}">
                            @if ($errors->has('titre'))
                            <div class="text-danger-danger">
                                {{$errors->first('titre')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="contenu">Contenu</label>
                            <textarea type="text" id="contenu" name="contenu" class="form-control" value="{{ old('contenu') }}"></textarea>
                            @if ($errors->has('contenu'))
                            <div class="text-danger-danger">
                                {{$errors->first('contenu')}}
                            </div>
                            @endif
                        </div>
                        <input type="hidden" id="date" name="date" class="form-control" value="{{ now()->toDateString() }}">
                        <input type="hidden" id="user_id" name="user_id" class="form-control" value="{{ Auth::user()->id }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <h2>Version Anglaise</h2>
                        <div class="mb-3">
                            <label for="titre_en">Titre</label>
                            <input type="text" id="titre_en" name="titre_en" class="form-control" value="{{ old('titre_en') }}">
                            @if ($errors->has('titre'))
                            <div class="text-danger-danger">
                                {{$errors->first('titre')}}
                            </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="contenu_en">Contenu</label>
                            <textarea type="text" id="contenu_en" name="contenu_en" class="form-control" value="{{ old('contenu_en') }}"></textarea>
                            @if ($errors->has('contenu'))
                            <div class="text-danger-danger">
                                {{$errors->first('contenu')}}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="Sauvegarder" class="btn btn-custom">
                </div>
            </form>

        </div>
    </div>
</div>


@endsection