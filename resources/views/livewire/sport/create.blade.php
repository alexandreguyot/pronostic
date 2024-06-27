<form wire:submit.prevent="submit" class="pt-3 grid grid-cols-2 gap-2">

    <div class="form-group {{ $errors->has('sport.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.sport.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="sport.title">
        <div class="validation-message">
            {{ $errors->first('sport.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sport.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.sports.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
