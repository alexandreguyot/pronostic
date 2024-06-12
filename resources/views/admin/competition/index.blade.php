@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="bg-white card">
        <div class="border-b card-header border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    Liste des compétitions
                </h6>

                @can('competition_create')
                    <a class="btn btn-indigo" href="{{ route('admin.competitions.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.competition.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('competition.index')

    </div>
</div>
@endsection
