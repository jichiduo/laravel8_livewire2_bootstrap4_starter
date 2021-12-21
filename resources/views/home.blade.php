@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        Welcome, have a nice day!
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <p>Name:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::user()->name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Email:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Role:</p>
                            </div>
                            <div class="col-md-8">
                                <p>{{ Auth::user()->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
