<div class="row">
    <div class="col">
        @if(!$clientStatus)
            <button type="button" class="btn btn-danger btn-block" disabled>Client Status</button>
        @else
            <button type="button" class="btn btn-success btn-block" disabled>Client Status</button>
        @endif
    </div>
    <div class="col">
        @if($votingAllowed)
            <button type="button" class="btn btn-danger btn-block" wire:click="stopVoting()">Stop Voting!</button>
        @else
            <button type="button" class="btn btn-primary btn-block" wire:click="allowVoting()"

                    @if(!$clientStatus) disabled @endif
            >Allow Voting!
            </button>
        @endif
    </div>

    <div class="col">
        <button type="button" class="btn btn-warning btn-block" wire:click="$emit('resetBoard')">Reset</button>
    </div>

</div>
