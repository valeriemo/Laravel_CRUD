@extends('layouts/master')

@section('content')

<section class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <!-- Section de l'article -->
            <article class="card">
                <div class="card-body">
                    <!-- Titre de l'article -->
                    <h3 class="card-title">{{ $blog->titre }}</h3>
                    <!-- Auteur de l'article -->
                    <p class="card-text">Par <strong>{{ $blog->blogHasUser->username }}</strong></p>
                    <!-- Contenu de l'article -->
                    <p class="card-text">{{ $blog->contenu }}</p>
                </div>
            </article>
        </div>
    </div>
</section>



@endsection