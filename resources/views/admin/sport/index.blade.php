@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="bg-white card">
        <div class="border-b card-header border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Liste des sports
                </h6>

                @can('sport_create')
                    <a class="btn btn-indigo" href="{{ route('admin.sports.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.sport.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('sport.index')

    </div>
</div>
@endsection
