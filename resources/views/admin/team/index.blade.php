@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="bg-white card">
        <div class="border-b card-header border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Liste des équipes ou athlètes
                </h6>

                @can('team_create')
                    <a class="btn btn-indigo" href="{{ route('admin.teams.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.team.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('team.index')

    </div>
</div>
@endsection
