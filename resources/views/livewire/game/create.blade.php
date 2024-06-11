<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('game.competition_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="competition">{{ trans('cruds.game.fields.competition') }}</label>
        <x-select-list class="form-control" required id="competition" name="competition" :options="$this->listsForFields['competition']" wire:model="game.competition_id" />
        <div class="validation-message">
            {{ $errors->first('game.competition_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.game.fields.competition_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('game.tour') ? 'invalid' : '' }}">
        <label class="form-label" for="tour">{{ trans('cruds.game.fields.tour') }}</label>
        <input class="form-control" type="text" name="tour" id="tour" wire:model.defer="game.tour">
        <div class="validation-message">
            {{ $errors->first('game.tour') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.game.fields.tour_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('game.date_time') ? 'invalid' : '' }}">
        <label class="form-label required" for="date_time">{{ trans('cruds.game.fields.date_time') }}</label>
        <x-date-picker class="form-control" required wire:model="game.date_time" id="date_time" name="date_time" />
        <div class="validation-message">
            {{ $errors->first('game.date_time') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.game.fields.date_time_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('game.home_team_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="home_team">{{ trans('cruds.game.fields.home_team') }}</label>
        <x-select-list class="form-control" required id="home_team" name="home_team" :options="$this->listsForFields['home_team']" wire:model="game.home_team_id" />
        <div class="validation-message">
            {{ $errors->first('game.home_team_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.game.fields.home_team_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('game.home_score') ? 'invalid' : '' }}">
        <label class="form-label required" for="home_score">{{ trans('cruds.game.fields.home_score') }}</label>
        <input class="form-control" type="number" name="home_score" id="home_score" required wire:model.defer="game.home_score" step="1">
        <div class="validation-message">
            {{ $errors->first('game.home_score') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.game.fields.home_score_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('game.exterior_team_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="exterior_team">{{ trans('cruds.game.fields.exterior_team') }}</label>
        <x-select-list class="form-control" required id="exterior_team" name="exterior_team" :options="$this->listsForFields['exterior_team']" wire:model="game.exterior_team_id" />
        <div class="validation-message">
            {{ $errors->first('game.exterior_team_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.game.fields.exterior_team_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('game.exterior_score') ? 'invalid' : '' }}">
        <label class="form-label required" for="exterior_score">{{ trans('cruds.game.fields.exterior_score') }}</label>
        <input class="form-control" type="number" name="exterior_score" id="exterior_score" required wire:model.defer="game.exterior_score" step="1">
        <div class="validation-message">
            {{ $errors->first('game.exterior_score') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.game.fields.exterior_score_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>