@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.pronostic.title_singular') }}:
                    {{ trans('cruds.pronostic.fields.id') }}
                    {{ $pronostic->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('pronostic.edit', [$pronostic])
        </div>
    </div>
</div>
@endsection