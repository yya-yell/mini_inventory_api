<div class="col-md-3 col-lg-2 mb-2" id="item_wrapper" forId="{{ $item->id }}">
    <div class="sub_item_wrapper card text-center p-2 border {{ $item->order_available ? 'border-success' : 'border-info' }}">
        
        <div id="edit_form" class="d-none">
            <form>
                <input type="text" name="item_name" value="{{ $item->item_name }}"
                    class="form-control item_name text-center text-primary form-control-sm">

                <input type="text" name="price" value="{{ $item->price }}"
                    class="form-control price text-center form-control-sm my-2">

                <input type="checkbox" value="true" class="form-check-sm order_available" {{$item->order_available ? 'checked' : ''}}  name="order_available">  
                
                <small class="text-xs">Check if this can order.</small>
                <button type="submit" id="save_edit" class="btn btn-sm btn-outline-success">Save</button>
                <button type="button" class="btn btn-sm btn-outline-info" id="cancle_edit">cancle</button>
            </form>
        </div>
        <div id="real_data">
            <a href="" class="item_name_data">{{ $item->item_name }}</a>
            <p><span class="price_data">{{ $item->price }}</span> ~ kyat</p>
            <div id="edit_btns" class="d-none">
                <button class="btn btn-outline-info btn-sm" id="edit_item">Edit</button>
                <button class="btn btn-outline-danger btn-sm" id="delete_item" ToD="{{ $item->id }}">Delete</button>
            </div>
        </div>
        <div class="rounded" style="">
            <input type="checkbox" value="{{ $item->id }}" class="d-none th_checker">
            <input type="number" name="qty" placeholder="1" disabled min="1" max="5"  class="d-none qty_input border th_qty_input">
        </div>
    </div>
</div>
