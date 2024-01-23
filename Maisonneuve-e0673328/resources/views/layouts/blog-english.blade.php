<div class="form-body-cart">
    <div>
        <h2>@lang('lang.english_version')</h2>
        <div class="mb-3">
            <label for="titre_en">@lang('lang.titre')</label>
            <input type="text" id="titre_en" name="titre_en" class="form-control" value="{{ old('titre_en') }}">
            @if ($errors->has('titre'))
            <div class="text-danger-danger">
                {{$errors->first('titre')}}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="contenu_en">@lang('lang.contenu')</label>
            <textarea type="text" id="contenu_en" name="contenu_en" class="form-control">{{ old('contenu_en') }}</textarea>
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
