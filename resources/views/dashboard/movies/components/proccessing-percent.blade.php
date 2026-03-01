<div>
    @if($percent != '100')
        <div wire:poll.5000ms="refreshPercent">
            <div class="badge badge-info fw-bold">Processing {{$percent}}%</div>
        </div>
    @else
        <div class="badge badge-outline badge-primary fw-bold">Processed</div>
    @endif

</div>

