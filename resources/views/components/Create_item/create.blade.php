<form action="/inventory/create" method="post">
    @csrf
    <div class="mb-3">
        <label for="item" class="form-label">ပစ္စည်းနာမည်</label>
        <input type="text" required class="form-control text-primary" id="item" placeholder="ပန်းသီး" name="item_name"
            aria-describedby="emailHelp">
        <x-errors name="item_name" />
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">စျေးနှုန်း</label>
        <input type="text" required class="form-control text-primary" id="price" placeholder="300" name="price">
        <x-errors name="price" />
    </div>
    <div class="mb-3 d-flex align-items-center">
        <input type="checkbox" class="form-check mr-3" value="true" name="order_available" > <small>Check if this item can order.</small>
    </div> 
    <button type="submit" class="btn btn-primary">Create</button>
</form>