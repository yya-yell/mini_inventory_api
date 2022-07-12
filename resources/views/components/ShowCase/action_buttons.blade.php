<div class="col-md-12 col-lg-auto">
    <div class="d-flex mt-3">
        <x-drop-down :current="$current" />
        <button class="btn btn-outline-info mx-2" id="edit_items">Edit</button>
        <button class="btn btn-warning mx-2 d-none" id="Done">Done</button>
        <button class="btn btn-outline-success mx-2" id="th_show_select">Create Today History</button>
    </div>
</div>
<div class="col-md-12 col-lg-auto">
    <div class="d-flex mt-3">
        <x-search />
        <x-total-count />
    </div>
</div>