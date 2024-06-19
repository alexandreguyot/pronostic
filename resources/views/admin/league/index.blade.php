@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="bg-white card">
        <div class="border-b card-header border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Liste des ligues
                </h6>

                @can('league_create')
                    <a class="btn btn-indigo" href="{{ route('admin.leagues.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.league.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('league.index')

    </div>
</div>
@endsection
