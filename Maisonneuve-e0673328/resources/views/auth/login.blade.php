@extends('layouts/master')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">

            <form action="{{ route('authentication')}}" method="post">
                @csrf
                <div class="card-header display-6 text-center">
                    Login
                </div>
                <div class="card-body">
                    @if (!$errors->isEmpty())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="control-group col-12">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <div class="text-danger">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="control-group col-12">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control">
                    </div>
                    @if ($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <input type="submit" value="Connecter" class="btn btn-success">
                </div>
            </form>

        </div>
    </div>
</div>

@endsection