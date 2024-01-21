<div class="form-body-cart">
    <div>
        <h2>@lang('lang.french_version')</h2>
        <div class="mb-3">
            <label for="titre">@lang('lang.titre')</label>
            <input type="text" id="titre" name="titre" class="form-control" value="{{ old('titre') }}">
            @if ($errors->has('titre'))
            <div class="text-danger-danger">
                {{$errors->first('titre')}}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="contenu">@lang('lang.contenu')</label>
            <textarea type="text" id="contenu" name="contenu" class="form-control">{{ old('contenu') }}</textarea>
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