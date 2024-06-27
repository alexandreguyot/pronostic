<form wire:submit.prevent="submit" class="pt-3 grid grid-cols-2 gap-2">

    <div class="form-group {{ $errors->has('competition.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.competition.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="competition.title">
        <div class="validation-message">
            {{ $errors->first('competition.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.competition.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('sport') ? 'invalid' : '' }}">
        <label class="form-label required" for="sport">{{ trans('cruds.competition.fields.sport') }}</label>
        <x-select-list class="form-control" required id="sport" name="sport" wire:model="sport" :options="$this->listsForFields['sport']" multiple />
        <div class="validation-message">
            {{ $errors->first('sport') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.competition.fields.sport_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.competitions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
