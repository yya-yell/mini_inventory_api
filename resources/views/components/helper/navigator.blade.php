<div id="{{ $ids }}" class="position-fixed d-none" style="z-index:999; right : 2rem; top : 7rem;">
    <div class="p-3 bg-primary rounded d-flex">
        <p class="text-white mb-0">
            <span class="d-block">{{ $header }}</span>
        </p>
            <div id="edit_counter_wrapper" class="text-white mx-3">
                <span id="counter">0</span> / <span id="total_counter">{{ $count }}</span> <br>
            </div>
            <div id="th_counter_wrapper" class="text-white mx-3">
                <span id="th_counter">0</span> / <span id="total_counter">{{ $count }}</span>
            </div>
        {{ $slot }}
    </div>
</div>
