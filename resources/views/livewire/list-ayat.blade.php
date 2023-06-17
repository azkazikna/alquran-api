<div>
    <div class="container mt-5">
        <div class="row">
            <div class="mx-auto text-center mb-5">
                <h1 class="arab">{{ $data["nama"] }}</h1>
                <span class="text-muted text-small">({{ $data["arti"] }})</span>
                <h3>Surah {{ $data["namaLatin"] }}</h3>
                <p>{!! $data["deskripsi"] !!}</p>
                <audio id="audio-surah" src="{{ $data["audioFull"][$audio] }}"></audio>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-dark btn-sm mr-2" onclick="playAudioSurah()"><i class="fa-solid fa-play"></i> &nbsp;Dengarkan Surah</button>
                    <select wire:model="audio" id="audio" class="form-control w-50">
                        <option value="01">Abdullah Al Juhany</option>
                        <option value="02">Abdul Muhsin Al Qasim</option>
                        <option value="03">Abdurrahman as Sudais</option>
                        <option value="04">Ibrahim Al Dossari</option>
                        <option value="05">Misyari Rasyid Al Afasi</option>
                    </select>
                </div>
            </div>
        </div>
        <p class="font-weight-bold text-small"><i class="fas fa-circle-exclamation"></i>&nbsp; Klik pada teks arab untuk mendengarkan audio per-ayat.</p>
        <h2 class="arab text-center my-4">بِسْمِ اللهِ الرَّحْمَنِ الرَّحِيْمِ</h2>
        @foreach ($data["ayat"] as $item)
        <div class="row_ayat">
            <hr>
            <div class="d-flex justify-content-between align-items-start">
                <div class="text-center">
                    <div class="p-3 fw-bold bg-dark text-white d-flex justify-content-center align-items-center" style="width: 20px; height: 20px;">{{ $item["nomorAyat"] }}</div>
                    <span data-toggle="tooltip" data-placement="right" title="Tafsir"><i class="fa-regular fa-eye mt-3 text-muted tafsir" data-toggle="modal" data-target="#exampleModal{{ $item["nomorAyat"] }}"></i></span>
                </div>
                <div class="audio-container">
                    <audio id="audio-ayat-{{ $item["nomorAyat"] }}" src="{{ $item["audio"][$audio] }}"></audio>
                    <h2 class="arab mt-5 text-right ayat" onclick="playAudioAyat({{ $item['nomorAyat'] }})">{{ $item["teksArab"] }}</h2>
                </div>
            </div>
            <p class="mt-4">{{ $item["teksLatin"] }}</p>
            <p>{{ $item["teksIndonesia"] }}</p>
            <!-- Start Modal -->
            <div class="modal fade" id="exampleModal{{ $item["nomorAyat"] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $data["namaLatin"] }} Ayat {{ $item["nomorAyat"] }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>{!! $item["tafsir"] !!}</p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                    </div>
                </div>
                </div>
            </div>
            <!-- End Modal -->
        </div>
        @endforeach
    </div>
</div>
