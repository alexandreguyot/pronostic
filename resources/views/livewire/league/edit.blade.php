<form wire:submit.prevent="submit" class="pt-3 grid grid-cols-2 gap-2">

    <div class="form-group {{ $errors->has('league.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.league.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="league.title">
        <div class="validation-message">
            {{ $errors->first('league.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.league.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('league.competition_id') ? 'invalid' : '' }}">
        <label class="form-label" for="competition_id">{{ trans('cruds.league.fields.competition') }}</label>
        <x-select-list class="form-control" id="competition_id" name="competition_id" wire:model="league.competition_id" :options="$this->listsForFields['competition']"/>
        <div class="validation-message">
            {{ $errors->first('league.competition_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.league.fields.competition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('league.sport_id') ? 'invalid' : '' }}">
        <label class="form-label" for="sport_id">{{ trans('cruds.league.fields.competition') }}</label>
        <x-select-list class="form-control" id="sport_id" name="sport_id" wire:model="league.sport_id" :options="$this->listsForFields['sport']"/>
        <div class="validation-message">
            {{ $errors->first('league.sport_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.league.fields.sport_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.league.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" wire:model="user" :options="$this->listsForFields['user']" multiple />
        <div class="validation-message">
            {{ $errors->first('user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.league.fields.user_helper') }}
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.leagues.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
