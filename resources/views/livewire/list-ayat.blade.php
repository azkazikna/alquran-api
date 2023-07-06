<div>
    <section class="container" wire:ignore>
        <nav class="navbar navbar-light navbar-static bg-faded" role="navigation">
      
          <a class="navbar-brand" href="#">
            <img src="assets/img/logo.png" alt="">
          </a>
      
          
      
         <ul class="navbar-side bg-white shadow-sm" id="navbarSide">
          <li class="navbar-side-item text-muted mt-3">
            <p class="side-link">Pengaturan</p>
            <hr>
          </li>
          <li class="navbar-side-item text-muted mt-3">
            <div class="side-link">
              <div class="d-flex justify-content-between align-items-center">
                <p class="w-50 mt-2">Bahasa Terjemahan</p>
                <select wire:model="language" id="language" class="form-control w-50">
                  @foreach ($data_languages as $item)
                      <option value="{{ $item["iso_code"] }}">{{ $item["name"] }}</option>
                  @endforeach
                </select>
              </div>
              <span class="text-small">Sumber terjemahan kata demi kata: <a href="">quranwbw</a>.</span>
              <span class="text-small"><i>Sumber ini tidak tergantung pada pemilihan terjemahan ayat.</i></span>
              <p class="w-50 mt-2">Bahasa Terjemahan</p>
            <input wire:model="dibarisan" type="checkbox" id="dibarisan" value="true">
            <label for="dibarisan" class="text-small">Dibarisan</label>
            </div>
          </li>
         </ul>
      
          <div class="overlay"></div>
        </nav>
      </section>

    <div class="container mt-5">
        <div class="row">
            <div class="mx-auto text-center mb-5">
                <h1 class="arab">{{ $data_surah["name_arabic"] }}</h1>
                <span class="text-muted text-small">({{ $data_surah["translated_name"]["name"] }})</span>
                <h3>Surah {{ $data_surah["name_simple"] }}</h3>
                <p>{!! $data_info_surah["short_text"] !!}</p>
                {{-- <audio id="audio-surah" src="{{ $data["audioFull"][$audio] }}"></audio> --}}
                {{-- <div class="d-flex justify-content-center">
                    <button class="btn btn-dark btn-sm mr-2" onclick="playAudioSurah()"><i class="fa-solid fa-play"></i> &nbsp;Dengarkan Surah</button>
                    <select wire:model="audio" id="audio" class="form-control w-50">
                        <option value="01">Abdullah Al Juhany</option>
                        <option value="02">Abdul Muhsin Al Qasim</option>
                        <option value="03">Abdurrahman as Sudais</option>
                        <option value="04">Ibrahim Al Dossari</option>
                        <option value="05">Misyari Rasyid Al Afasi</option>
                    </select>
                </div> --}}
            </div>
        </div>
        {{-- <p class="font-weight-bold text-small"><i class="fas fa-circle-exclamation"></i>&nbsp; Klik pada teks arab untuk mendengarkan audio per-ayat.</p> --}}
        <div class="d-flex justify-content-between">
            <span class="font-weight-bold text-small cursor-pointer" data-toggle="modal" data-target="#modalInfo"><i class="fas fa-circle-info"></i>&nbsp; Info Surah</span>
            <span class="font-weight-bold text-small cursor-pointer" data-toggle="modal" data-target="#modalTajwid"><i class="fas fa-circle-info"></i>&nbsp; Aturan Warna Tajwid</span>
        </div>
        @if ($data_surah["bismillah_pre"])
            <h2 class="arab text-center my-4">بِسْمِ اللهِ الرَّحْمَنِ الرَّحِيْمِ</h2>
        @endif
        @foreach ($data_ayat as $item)
        <div class="row_ayat">
            <hr>
            <div class="d-flex justify-content-between align-items-start">
                <div class="text-center">
                    <div class="p-3 fw-bold bg-dark text-white d-flex justify-content-center align-items-center" style="width: 20px; height: 20px;">{{ $item["verse_number"] }}</div>
                    
                    <span data-toggle="tooltip" data-placement="right" title="Tafsir"><i class="fa-regular fa-eye mt-3 text-muted tafsir" data-toggle="modal" data-target="#exampleModal{{ $item["verse_number"] }}"></i></span>
                    
                    <audio id="audio-ayat-{{ $item["verse_number"] }}" src="https://audio.qurancdn.com/{{ $item["audio"]["url"] }}"></audio>

                    <span data-toggle="tooltip" data-placement="right" title="Tafsir" class="d-block" onclick="playAudioAyat({{ $item['verse_number'] }})"><i id="play-icon-{{ $item['verse_number'] }}" class="fa-solid fa-play mt-1 text-muted cursor-pointer"></i></span>
                </div>
                <div class="audio-container">
                    <h2 class="arab ayat my-5 d-inline-block {{ $dibarisan ? 'text-center' :'text-right' }}" style="direction: rtl;">
                        @foreach ($item["words"] as $word)
                        <audio id="audio-kata-{{ $word["id"] }}" src="https://audio.qurancdn.com/{{ $word["audio_url"] }}"></audio>
                            <span tabindex="0" class="word-arab d-inline-block" onclick="playAudioWord({{ $word['id'] }})" data-toggle="tooltip" data-placement="top" title="{{ $word["translation"]["text"] }}">{!! $word["text_uthmani_tajweed"] !!}
                                @if ($dibarisan)
                                <div class="w-100">
                                    <span class="arti-perkata text-center mx-auto d-block">{{ $word["translation"]["text"] }}</span>
                                </div>
                                @endif
                            </span>
                        @endforeach
                    </h2>
                </div>
            </div>
            <p>
                @foreach ($item["words"] as $word)
                    {{ $word["transliteration"]["text"] }}
                @endforeach
            </p>
            <p class="mt-4">
                @foreach ($item["words"] as $word)
                    {{ ucfirst($word["translation"]["text"]) }}
                @endforeach
            </p>
            <!-- Start Modal -->
            <div wire:ignore.self class="modal fade" id="exampleModal{{ $item["verse_number"] }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tafsir {{ $data_surah["name_simple"] }} Ayat {{ $item["verse_number"] }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        {{-- <select wire:model="id_tafsir" id="id_tafsir" class="form-control">
                            @foreach ($data_tafsir as $tafsir)
                                <option value="{{ $tafsir["id"] }}">{{ $tafsir["translated_name"]["name"] }}</option>
                            @endforeach
                        </select> --}}
                    {{-- <p>{{ $id_tafsir }}</p> --}}
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

        <!-- Start Modal Info-->
        <div class="modal fade" id="modalInfo" tabindex="-1" aria-labelledby="modalInfoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title d-flex justify-content-between" id="modalInfoLabel">
                    <span>{{ $data_surah["name_simple"] }}</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body info-surah">
                <p>{!! $data_info_surah["text"] !!}</p>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        <!-- End Modal Info-->
       
        <!-- Start Modal Tajwid-->
        <div class="modal fade" id="modalTajwid" tabindex="-1" aria-labelledby="modalTajwidLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title d-flex justify-content-between" id="modalTajwidLabel">
                    <span>Aturan warna Tajwid</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
            </div>
        </div>
        <!-- End Modal Info-->
    </div>
</div>
