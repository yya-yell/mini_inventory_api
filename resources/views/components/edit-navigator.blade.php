{{-- <div id="edit-navigator" class="position-fixed d-none" style="z-index:999; right : 0; top : 7rem;">
    <div class="p-3 bg-primary rounded d-flex align-items-center">
        <p class="text-white mb-0">
            <span id="counter">0</span> / <span id="total_counter">{{ $count }}</span>
        </p>
        <button class="btn btn-outline-danger btn-sm mx-2" id="confirm_delete"><i class="fas fa-trash-alt"></i></button>
        <button class="btn btn-info btn-sm" id="delete-cancle">Cancle</button>
    </div>
</div> --}}

<x-helper.navigator ids="edit-navigator"  :count="$count" header="Delete">
    
    <button class="btn btn-outline-danger btn-sm mx-2" id="confirm_delete"><i class="fas fa-trash-alt"></i></button>
    <button class="btn btn-info btn-sm" id="delete-cancle">Cancle</button>

</x-helper.navigator>
