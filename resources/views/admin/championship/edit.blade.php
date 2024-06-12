@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.championship.title_singular') }}:
                    {{ trans('cruds.championship.fields.id') }}
                    {{ $championship->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('championship.edit', [$championship])
        </div>
    </div>
</div>
@endsection