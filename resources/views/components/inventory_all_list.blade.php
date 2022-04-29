<div class="w-100">
    <div class="row p-4" style="background-color: rgb(240,241,243)">
        <div class="col-12">
            <div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Create
                </button>
                <button class="btn btn-info">Edit</button>
            </div>
        </div>
        @foreach (range(1, 50) as $item)
            <div class="col-md-1 m-2">
                <div class="card  text-center p-2 border border-success">
                    <div><a href="">အာလူးကျော်</a>
                        <p class="">2500 ~ kyat</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
{{-- modal --}}
<x-modal />