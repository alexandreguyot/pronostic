@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="bg-white card">
        <div class="border-b card-header border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Liste des permissions
                </h6>

                @can('permission_create')
                    <a class="btn btn-indigo" href="{{ route('admin.permissions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('permission.index')

    </div>
</div>
@endsection
