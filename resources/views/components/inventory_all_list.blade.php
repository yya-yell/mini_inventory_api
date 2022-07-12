@props(['items', 'current'])
<x-Helper.labelOfthepages name="Dashboard" />
<div class="w-100">
    <div class="row">
        <div class="col-lg-3">
            <x-Create_item.create />
        </div>
        <div class="col-lg-9 ">
            <div class="row">
               <x-ShowCase.action_buttons  :current="$current"/>
                {{-- <div class="col-12">
                    <div class="d-flex align-items-center">
                        <x-drop-down :current="$current" />
                        <button class="btn btn-outline-info mx-2" id="edit_items">Edit</button>
                        <button class="btn btn-outline-warning mx-2 d-none" id="Done">Done</button>
                        <button class="btn btn-outline-success mx-2" id="th_show_select">Create Today History</button>
                        <x-search />
                        <x-total-count />
                    </div>
                </div> --}}
            </div>
            @if (request('search'))
                <div class="col-12">
                    <div class="d-flex justify-content-center mt-3">
                        <a href="/">clear search</a>
                    </div>
                </div>
            @endif
            <div class="row scroll" id="inventoreis_wrapper">
                {{-- @forelse ($items as $item)
                    <x-ShowCase.inventories :item="$item" />
                @empty
                    <div class="w-100  mt-3 d-flex justify-content-center">
                        <p class="text-info text-sm">Sorry, No items to show. But You can create.</p>
                    </div>
                @endforelse --}}
            </div>
        </div>
    </div>
</div>
