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
    <div class="form-group {{ $errors->has('mediaCollections.sport_picto') ? 'invalid' : '' }}">
        <label class="form-label" for="picto">{{ trans('cruds.sport.fields.picto') }}</label>
        <x-dropzone id="picto" name="picto" action="{{ route('admin.sports.storeMedia') }}" collection-name="sport_picto" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.sport_picto') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.sport.fields.picto_helper') }}
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
