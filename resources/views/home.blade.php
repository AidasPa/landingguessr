@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            @if($linked ?? false)
                <div class="alert alert-success" role="alert">
                    Twitch linked!
                </div>
            @endif
            <h4 class="card-title">Hello, {{ Auth::user()->name }}!</h4>
            <a href="/board" type="button" class="btn btn-primary btn-squared btn-block">Board</a>

        </div>
    </div>

    <br/>


    @include('board-legend')
@endsection
