@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    Créer son pronostic
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('pronostic.create')
        </div>
    </div>
</div>
@endsection
