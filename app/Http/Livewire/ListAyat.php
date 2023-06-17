<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ListAyat extends Component
{
    public $nomor, $audio = "05";

    public function mount($nomor)
    {
        $this->nomor = $nomor;
    }

    public function render()
    {
        $response_surah = Http::get("https://equran.id/api/v2/surat/$this->nomor");
        $response_tafsir = Http::get("https://equran.id/api/v2/tafsir/$this->nomor");

        if($response_surah->ok() && $response_tafsir->ok())
        {
            $data_surah = $response_surah->json();
            $data_tafsir = $response_tafsir->json();

            //ambil tafsirnya saja
            $data_tafsir = $data_tafsir["data"]["tafsir"];
            // dd($data_tafsir);

            //cari tafsirnya
            function findTafsir($nomorAyat, $tafsir)
            {
                foreach ($tafsir as $item) {
                    if ($item['ayat'] === $nomorAyat) {
                        return $item['teks'];
                    }
                }
                return null;
            }

            $data_surah["data"]["ayat"] = array_map(function ($ayat) use ($data_tafsir) {
                // fungsi untuk mencari tafsir berdasarkan nomor ayat
                $ayat['tafsir'] = findTafsir($ayat['nomorAyat'], $data_tafsir);
                return $ayat;
              }, $data_surah["data"]['ayat']);

            // dd($data_surah);

            return view('livewire.list-ayat', [
                'data' => $data_surah["data"],
                'audio' => $this->audio
            ]);
        } else {
            dd('gagal koneksi');
        }
    }
}
