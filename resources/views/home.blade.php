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

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Board Legend</h4>

            <h5 class="card-title">Client Status</h5>
            <div class="row">
                <div class="col-4">
                    <button type="button" class="btn btn-danger btn-block" disabled>Client Status</button>
                </div>
                <div class="col">
                    <p>
                        This means that the LandingGuessr client is <strong>not</strong> communicating with our server.
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <button type="button" class="btn btn-success btn-block" disabled>Client Status</button>
                </div>
                <div class="col">
                    <p>
                        This means that the LandingGuessr client is communicating with our server and the Voting can
                        begin.
                    </p>
                </div>
            </div>
            <hr/>
            <h5 class="card-title">Dots</h5>
            <div class="row">
                <div class="col-2">
                    <div class="dot dot--grey"></div>
                </div>
                <div class="col">
                    Aircraft not landed yet!
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <div class="dot dot--black"></div>
                </div>
                <div class="col">
                    Guessed landing rate matches the landing!
                </div>
            </div>
            <div class="row">
                <div class="col-2" style="font-size: 15px;">
                    ❌
                </div>
                <div class="col">
                    Landing rate does not match the guess.
                </div>
            </div>

        </div>
    </div>
@endsection
