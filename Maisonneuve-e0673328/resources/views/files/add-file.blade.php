@extends('layouts/master')
@section('content')

<div class="container d-flex justify-content-center">

    <div class="col-md-20">
        <form action="{{ route('file.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <h1 class="card-header mb-3 display-4 text-center titre">
                Ajoutez un fichier
            </h1>
            <div class="form-body file">

                <div class="mb-3">
                    <label for="nom">Nom du fichier</label>
                    <input type="text" name="nom" id="nom">
                    @if ($errors->has('nom'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom')}}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nom_en">Nom du fichier (version anglaise)</label>
                    <input type="text" name="nom_en" id="nom_en">
                    @if ($errors->has('nom_en'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom_en')}}
                    </div>
                    @endif
                </div>
                
                <div class="mb-3">
                    <label for="file">Sélectionnez un document :</label>
                    <input type="file" name="file" id="file" accept=".pdf, .zip, .doc">
                    @if ($errors->has('file'))
                    <div class="text-danger-danger">
                        {{$errors->first('file')}}
                    </div>
                    @endif
                </div>

            </div>
            <div class="card-footer text-center">
                <input type="submit" value="@lang('lang.save')" class="btn btn-custom">
            </div>
        </form>
    </div>
</div>
@endsection