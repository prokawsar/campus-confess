@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Great!!</div>

                <div class="panel-body">
                "Hello {{ $name or '' }} You are learning Laravel"
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
