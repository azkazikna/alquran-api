<div>
    <div class="container mt-5">
        <form action="">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-white" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                    <input wire:model="search" type="search" class="form-control" placeholder="Cari... (sebelum tidur, dst)" aria-label="Cari">
                </div>
            </div>
        </form>
        <div class="row card-equal-height">
            @foreach ($data as $item)
            <div class="col-12 mt-2">
                <div class="card text-decoration-none text-dark cursor-pointer" data-toggle="modal" data-target="#exampleModal{{ $item["id"] }}">
                    <div class="card-body">
                        <div class="row px-3 align-items-center">
                            <div class="p-3 fw-bold bg-dark text-white rounded d-flex justify-content-center align-items-center rounded-circle" style="width: 30px; height: 30px;">{{ $item["id"] }}</div>
                            <h6 class="col-4 text-end">{{ $item["doa"] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Modal -->
            <div class="modal fade" id="exampleModal{{ $item["id"] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $item["doa"] }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body row_ayat">
                        <h2 class="arab text-center mb-4">بِسْمِ اللهِ الرَّحْمَنِ الرَّحِيْمِ</h2>
                        <hr>
                        <h2 class="arab text-right my-4">{{  $item["ayat"]  }}</h2>
                        <p class="mt-4">{{ $item["latin"] }}</p>
                        <p>{{ $item["artinya"] }}</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- End Modal -->
            @endforeach
        </div>
    </div>
</div>
