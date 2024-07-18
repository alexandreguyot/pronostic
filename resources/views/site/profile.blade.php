@extends('layouts.site')
@section('content')
    <div class="flex justify-center w-full bg-gradient-title py-4">
        <h2 class="font-bold text-xl">Mon profil</h2>
    </div>

    <form wire:submit.prevent="submit" class="pt-3 grid grid-cols-2 gap-2">
        <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
            <label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</label>
            <input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name">
            <div class="validation-message">
                {{ $errors->first('user.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.name_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('user.firstname') ? 'invalid' : '' }}">
            <label class="form-label required" for="firstname">{{ trans('cruds.user.fields.firstname') }}</label>
            <input class="form-control" type="text" name="firstname" id="firstname" required wire:model.defer="user.firstname">
            <div class="validation-message">
                {{ $errors->first('user.firstname') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.firstname_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
            <label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</label>
            <input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email">
            <div class="validation-message">
                {{ $errors->first('user.email') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.email_helper') }}
            </div>
        </div>
        <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
            <label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
            <input class="form-control" type="password" name="password" id="password" wire:model.defer="password">
            <div class="validation-message">
                {{ $errors->first('user.password') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.user.fields.password_helper') }}
            </div>
        </div>

        <div class="form-group">
            <button class="btn btn-indigo mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </form>

@endsection
