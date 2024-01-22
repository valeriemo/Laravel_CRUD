@extends('layouts/master')
@section('content')

<div class="container d-flex justify-content-center">

    <div class="col-md-20">
        <form action="{{ route('file.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <h1 class="card-header mb-3 display-4 text-center titre">
                Changer le nom du fichier
            </h1>
            <div class="form-body file">

                <div class="mb-3">
                    <label for="nom">Nouveau nom du fichier</label>
                    <input type="text" name="nom" id="nom" value="{{$file->nom}}">
                    @if ($errors->has('nom'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom')}}
                    </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="nom_en">Nom du fichier (version anglaise)</label>
                    <input type="text" name="nom_en" id="nom_en" value="{{$file->nom_en}}">
                    @if ($errors->has('nom_en'))
                    <div class="text-danger-danger">
                        {{$errors->first('nom_en')}}
                    </div>
                    @endif
                </div>

            </div>
            <div class="card-footer text-center">
                <input type="submit" value="@lang('lang.save')" class="btn btn-custom">
            </div>
        </form>
        <!-- Modal -->
        <div class="text-center mt-2">
            <button type="button" class="btn btn-custom-danger" data-bs-toggle="modal" data-bs-target="#deletemodal">
                Effacer ce fichier
            </button>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer le fichier</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Êtes-vous certain de bien vouloir effacer <span class="danger">{{$file->nom}}</span> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-custom" data-bs-dismiss="modal">Non</button>
                <form action="{{ route('file.delete', $file->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Effacer" class="btn btn-custom-danger">
                </form>
            </div>
        </div>
    </div>
</div>

@endsection