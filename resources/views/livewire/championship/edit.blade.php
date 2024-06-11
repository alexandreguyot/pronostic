<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('championship.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.championship.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="championship.title">
        <div class="validation-message">
            {{ $errors->first('championship.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.championship.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user') ? 'invalid' : '' }}">
        <label class="form-label" for="user">{{ trans('cruds.championship.fields.user') }}</label>
        <x-select-list class="form-control" id="user" name="user" wire:model="user" :options="$this->listsForFields['user']" multiple />
        <div class="validation-message">
            {{ $errors->first('user') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.championship.fields.user_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.championships.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>