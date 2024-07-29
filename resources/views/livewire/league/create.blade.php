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
    <div class="form-group {{ $errors->has('league.competition') ? 'invalid' : '' }}">
        <label class="form-label" for="competition">{{ trans('cruds.league.fields.competition') }}</label>
        <x-select-list class="form-control" id="competition" name="competition" wire:model="competition" :options="$this->listsForFields['competition']"/>
        <div class="validation-message">
            {{ $errors->first('league.competition') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.league.fields.competition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('league.sport') ? 'invalid' : '' }}">
        <label class="form-label" for="sport">{{ trans('cruds.league.fields.sport') }}</label>
        <x-select-list class="form-control" id="sport" name="sport" wire:model="sport" :options="$this->listsForFields['sports']" multiple/>
        <div class="validation-message">
            {{ $errors->first('league.sport') }}
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
