<!-- THIS PAGE NO LONGER USE -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidemenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ __('app.Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('app.You are logged in') }}, {{ Auth::user()->name }}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
