@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="bg-white card">
        <div class="border-b card-header border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Liste des matchs
                </h6>

                @can('game_create')
                    <a class="btn btn-indigo" href="{{ route('admin.games.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.game.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('game.index')

    </div>
</div>
@endsection
