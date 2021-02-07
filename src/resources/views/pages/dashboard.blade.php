@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('layouts.sidemenu')
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">{{ $title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card text-center">
                            <div class="card-header bg-info">Total Merchant</div>
                            <div class="card-body">
                                <h3 class="card-title"><?=count($merchants)?></h3>
                                <span class="badge bg-success text-white">Android: <?=count($androidp)?></span>
                                <span class="badge bg-secondary text-white">iOS: <?=count($iosp)?></span>
                            </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection