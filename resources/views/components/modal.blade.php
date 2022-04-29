<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Create Inventory item</h5>
                <button type="button" class="btn btn-sm btn-outline-danger btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                    <form action="/inventory/create" method="post">
                        @csrf
                        <div class="row justify-content-between px-3">
                            <div class="mb-3">
                                <label for="item" class="form-label">ပစ္စည်းနာမည်</label>
                                <input type="text" class="form-control" id="item" placeholder="ပန်းသီး" name="item_name"
                                    aria-describedby="emailHelp">
                                    <x-errors name="item_name"/>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">စျေးနှုန်း</label>
                                <input type="number" class="form-control" id="price" placeholder="300" name="price">
                                <x-errors name="price"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
            </div>
            
        </div>
    </div>
</div>
