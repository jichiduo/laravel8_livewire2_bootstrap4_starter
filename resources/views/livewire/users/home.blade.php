@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> <i class="bi bi-people"></i> {{ __('Users') }}</div>

                <div class="card-body">
                    <livewire:users.controller />

                </div>
            </div>
        </div>
    </div>
</div>
@endsection