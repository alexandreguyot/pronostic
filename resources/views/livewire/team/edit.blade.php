<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('team.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.team.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="team.name">
        <div class="validation-message">
            {{ $errors->first('team.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.sport') ? 'invalid' : '' }}">
        <label class="form-label required" for="sport">{{ trans('cruds.team.fields.sport') }}</label>
        <input class="form-control" type="text" name="sport" id="sport" required wire:model.defer="team.sport">
        <div class="validation-message">
            {{ $errors->first('team.sport') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.sport_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('team.group') ? 'invalid' : '' }}">
        <label class="form-label" for="group">{{ trans('cruds.team.fields.group') }}</label>
        <input class="form-control" type="text" name="group" id="group" wire:model.defer="team.group">
        <div class="validation-message">
            {{ $errors->first('team.group') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.team.fields.group_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.teams.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>