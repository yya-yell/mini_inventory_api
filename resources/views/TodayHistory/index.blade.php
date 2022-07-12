<x-layout>
    <x-Helper.labelOfthepages name="Today History" />
    <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="w-75 d-flex justify-content-between align-items-center">
                <div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Create
                    </button>
                    <button type="button" class="px-3 py-1 border border-info text-info bg-white rounded mt-3">စုစုပေါင်း
                        ({{ $sum }}) ကျပ်ရောင်းပြီး</button>
                </div>
                <div class="">
                    <button type="button" class="btn btn-outline-success"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="This will delete from here and move to the history.">
                        Calculate
                    </button>
                </div>
            </div>
        </div>

        <div class="col-12">


            <div class="card p-3 mt-3 w-75">
                <table id="datatable" class="table display" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">price</th>
                            <th scope="col">qty</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Created at</th>
                        </tr>
                    </thead>
                    <tbody class="text-dark">
                    </tbody>
                </table>
            </div>
        </div>
        <x-today-history-modal />
    </div>
    </div>
</x-layout>
