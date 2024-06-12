@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="bg-white card">
        <div class="border-b card-header border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Liste des championnats
                </h6>

                @can('championship_create')
                    <a class="btn btn-indigo" href="{{ route('admin.championships.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.championship.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('championship.index')

    </div>
</div>
@endsection
