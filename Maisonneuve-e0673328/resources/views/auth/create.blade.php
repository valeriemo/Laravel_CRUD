@extends('layouts/master')
@section('content')

<div class="container typo">
    <div class="row">
        <div class="container d-flex justify-content-center">
            <form action="{{ route('registration') }}" method="post">
                @csrf
                <h1 class="card-header mb-3 display-4 text-center titre">
                    @lang('lang.register')
                </h1>
                <div class="card-body">
                <h2 class="mt-3 mb-3 display-7 text-center titre">@lang('lang.student_information')</h2>
                    <div class="mb-3">
                        <label for="nom">@lang('lang.name')</label>
                        <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom') }}">
                        @if ($errors->has('nom'))
                        <div class="text-danger-danger">
                            {{$errors->first('nom')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="adresse">@lang('lang.address')</label>
                        <input id="adresse" name="adresse" class="form-control" value="{{ old('adresse') }}"></input>
                        @if ($errors->has('adresse'))
                        <div class="text-danger-danger">
                            {{$errors->first('adresse')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="body">@lang('lang.ville')</label>
                        <select id="ville_id" name="ville_id" class="form-control">
                            @foreach($villes as $ville)
                            <option value="{{ $ville->id }}">{{$ville->ville}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telephone">@lang('lang.telephone')</label>
                        <input id="telephone" name="telephone" class="form-control" value="{{ old('telephone') }}"></input>
                        @if ($errors->has('telephone'))
                        <div class="text-danger-danger">
                            {{$errors->first('telephone')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="date_naissance">@lang('lang.date_naissance')</label>
                        <input type="date" id="date_naissance" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}"></input>
                        @if ($errors->has('date_naissance'))
                        <div class="text-danger-danger">
                            {{$errors->first('date_naissance')}}
                        </div>
                        @endif
                    </div>
                    <h2 class="mt-3 mb-3 display-7 text-center titre">@lang('lang.user_information')</h2>
                    <div class="mb-3">
                        <label for="username">@lang('lang.username')</label>
                        <input type="text" id="username" minlength="6" maxlength="25" name="username" class="form-control" value="{{ old('username') }}">
                        @if ($errors->has('username'))
                        <div class="text-danger-danger">
                            {{$errors->first('username')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="email">@lang('lang.email')</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                        <div class="text-danger-danger">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password">@lang('lang.password')</label>
                        <input type="text" id="password" minlength="6" maxlength="20" name="password" class="form-control" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                        <div class="text-danger-danger">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">@lang('lang.password_confirmation')</label>
                        <input type="text" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password_confirmation') }}">
                        @if ($errors->has('password'))
                        <div class="text-danger-danger">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                    </div>
                    <div class="card-footer text-center">
                        <input type="submit" value="@lang('lang.save')" class="btn btn-custom">
                    </div>
            </form>
        </div>
    </div>
</div>

@endsection