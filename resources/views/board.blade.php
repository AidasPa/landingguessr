@extends('layouts.app')
@section('content')
    <div class="alert alert-primary" role="alert">
        Note! You do not need to refresh this page! It will update automatically.
    </div>
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Board</h4>

            @livewire('board.votes', ['votes' => $board->votes, 'board' => $board])

            <br/>
            <hr/>

            @livewire('board.buttons', ['board' => $board])

        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endsection
