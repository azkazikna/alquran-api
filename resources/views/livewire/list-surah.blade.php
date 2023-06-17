<div>
    <div class="container mt-5">
        <form action="">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-dark text-white" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                    </div>
                    <input wire:model="search" type="search" class="form-control" placeholder="Cari... (Al-fatihah, dst)" aria-label="Cari">
                </div>
            </div>
        </form>
        <div class="row card-equal-height">
            @foreach ($data as $item)
            <div class="col-12 col-lg-6 col-xl-4 mt-2">
                <a href="/surah/{{ $item["id"] }}" class="card text-decoration-none text-dark">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-3 fw-bold bg-dark text-white rounded d-flex justify-content-center align-items-center rounded mr-3" style="width: 50px; height: 50px;">{{ $item["id"] }}</div>
                            <div class="w-100">
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="">
                                        <h5 class="heading-surah">{{ $item["name_simple"] }}</h5>
                                    </div>
                                    <div class="">
                                        <h6 class="arab text-end">{{ $item["name_arabic"] }}</h6>
                                    </div>
                                </div>
                                <div class="d-flex w-100 justify-content-between">
                                    <div class="">
                                        <span class="text-muted text-small">{{ $item["translated_name"]["name"] }}</span>
                                    </div>
                                    <div class="">
                                        <span class="text-muted text-small">{{ $item["verses_count"] }} Ayat</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>
