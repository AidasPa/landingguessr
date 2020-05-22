<div class="row">
    <div class="col-4"><strong>Dot</strong></div>
    <div class="col-4"><strong>Twitch Username</strong></div>
    <div class="col-4"><strong>Guess</strong></div>
</div>
<hr/>

@if(count($votes) === 0)
    <p class="text-center mt-4">No votes!</p>
@endif
@foreach($votes as $vote)
    <div class="row">
        <div class="col-4">
            <div class="dot dot--grey"></div>
        </div>
        <div class="col-4">{{$vote->twitch_username}}</div>
        <div class="col-4">{{$vote->guess}}</div>
    </div>
@endforeach



