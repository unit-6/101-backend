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
                    

                    this is merchant page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection