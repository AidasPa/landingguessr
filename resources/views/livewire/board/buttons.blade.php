<div class="row">
    <div class="col">
        <button type="button" class="btn btn-danger btn-block" disabled>Client Status</button>
    </div>
    <div class="col">
        @if($votingAllowed)
            <button type="button" class="btn btn-danger btn-block" wire:click="stopVoting()">Stop Voting!</button>
        @else
            <button type="button" class="btn btn-primary btn-block" wire:click="allowVoting()">Allow Voting!</button>
        @endif
    </div>

    <div class="col">
        <button type="button" class="btn btn-warning btn-block">Reset</button>
    </div>

    <div>

    </div>
</div>
