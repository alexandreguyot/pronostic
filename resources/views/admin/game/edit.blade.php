@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    Editer un match
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('game.edit', [$game])
        </div>
    </div>
</div>
@endsection
