<form wire:submit.prevent="submit" class="pt-3 grid grid-cols-2 gap-2">

    <div class="form-group {{ $errors->has('pronostic.game_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="game">{{ trans('cruds.pronostic.fields.game') }}</label>
        <x-select-list class="form-control" required id="game" name="game" :options="$this->listsForFields['game']" wire:model="pronostic.game_id" />
        <div class="validation-message">
            {{ $errors->first('pronostic.game_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pronostic.fields.game_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pronostic.user_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="user">{{ trans('cruds.pronostic.fields.user') }}</label>
        <x-select-list class="form-control" required id="user" name="user" :options="$this->listsForFields['user']" wire:model="pronostic.user_id" />
        <div class="validation-message">
            {{ $errors->first('pronostic.user_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pronostic.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pronostic.score_home') ? 'invalid' : '' }}">
        <label class="form-label required" for="score_home">{{ trans('cruds.pronostic.fields.score_home') }}</label>
        <input class="form-control" type="number" name="score_home" id="score_home" required wire:model.defer="pronostic.score_home" step="1">
        <div class="validation-message">
            {{ $errors->first('pronostic.score_home') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pronostic.fields.score_home_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pronostic.score_exterior') ? 'invalid' : '' }}">
        <label class="form-label" for="score_exterior">{{ trans('cruds.pronostic.fields.score_exterior') }}</label>
        <input class="form-control" type="number" name="score_exterior" id="score_exterior" wire:model.defer="pronostic.score_exterior" step="1">
        <div class="validation-message">
            {{ $errors->first('pronostic.score_exterior') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pronostic.fields.score_exterior_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('pronostic.points') ? 'invalid' : '' }}">
        <label class="form-label" for="points">{{ trans('cruds.pronostic.fields.points') }}</label>
        <input class="form-control" type="number" name="points" id="points" wire:model.defer="pronostic.points" step="1">
        <div class="validation-message">
            {{ $errors->first('pronostic.points') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.pronostic.fields.points_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.pronostics.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
