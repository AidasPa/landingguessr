<div>
    <h3 class="text-center">
        @if(!$landingRate)
            --- fpm
        @else
            🛬 {{$landingRate}} fpm
        @endif
    </h3>
    <hr/>
    <div class="row">
        <div class="col-4"><strong>Dot</strong></div>
        <div class="col-4"><strong>Twitch Username</strong></div>
        <div class="col-4"><strong>Guess</strong></div>
    </div>
    <hr/>


    @if(count($votes) === 0)
        @if($boardReset)
            <p class="text-center mt-4 text-success">Board Reset!</p>
        @else
            <p class="text-center mt-4">No votes!</p>
        @endif
    @endif

    @foreach($votes as $vote)
        <div class="row">
            <div class="col-4">
                <div class="dot dot--grey"></div>
            </div>
            <div class="col-4">{{ $vote['twitch_username'] }}</div>
            <div class="col-4">{{ $vote['guess'] }}</div>
        </div>
    @endforeach


</div>
