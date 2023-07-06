<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ListAyat extends Component
{
    public $id_surah, $audio = "05", $language = "id", $data_languages, $dibarisan = false;

    public function mount($id_surah)
    {
        $this->id_surah = $id_surah;

        $response_languages = Http::get("https://api.quran.com/api/v4/resources/languages");

        if($response_languages->ok())
        {
            $data_languages = $response_languages->json();

            $this->data_languages = $data_languages['languages'];
        }
    }

    public function render()
    {
        $response_surah = Http::get("https://api.quran.com/api/v4/chapters/$this->id_surah?language=$this->language");
        $response_info_surah = Http::get("https://api.quran.com/api/v4/chapters/$this->id_surah/info?language=$this->language");
        $response_ayat = Http::get("https://api.quran.com/api/v4/verses/by_chapter/$this->id_surah?language=$this->language&words=true&word_fields=text_uthmani_tajweed&audio=2&per_page=300");
        $response_audio_ayat = Http::get("https://api.quran.com/api/v4/quran/recitations/1?chapter_number=$this->id_surah");

        

        if($response_surah->ok() && $response_info_surah->ok() && $response_ayat->ok() && $response_audio_ayat->ok())
        {

            // $textUthmaniTajweed = "";
            // foreach ($data_tajwid as $verse) {
            //     $textUthmaniTajweed .= $verse['text_uthmani_tajweed'];
            // }
            // dd($textUthmaniTajweed); // atau print_r($textUthmaniTajweed);
            

            $data_surah = $response_surah->json();
            $data_surah = $data_surah['chapter'];
            // dd($this->id_tafsir);
            
            $data_info_surah = $response_info_surah->json();
            $data_info_surah = $data_info_surah['chapter_info'];

            // dd($data_surah);
            $data_ayat = $response_ayat->json();
            $data_ayat = $data_ayat["verses"];

            // dd($data_ayat);
            
            $data_audio_ayat = $response_audio_ayat->json();
            $data_audio_ayat = $data_audio_ayat["audio_files"];

            foreach ($data_ayat as &$ayat) {
                $verseKey = $ayat['verse_key'];
                $data_audio_ayat = array_filter($data_audio_ayat, function ($item) use ($verseKey) {
                    return $item['verse_key'] === $verseKey;
                });
            
                if (!empty($data_audio_ayat)) {
                    $ayat['audio'] = reset($data_audio_ayat);
                }
            }

            unset($ayat); // Hapus referensi terakhir agar tidak berpengaruh pada iterasi berikutnya

            // dd($data_ayat);
            
            return view('livewire.list-ayat', [
                'data_surah' => $data_surah,
                'data_info_surah' => $data_info_surah,
                'data_ayat' => $data_ayat,
                'data_languages' => $this->data_languages,
                // 'id_tafsir' => $this->id_tafsir
            ]);
        } else {
            dd('gagal koneksi');
        }
    }

    public function updated()
    {
        $this->dispatchBrowserEvent('livewire:entangled');
    }
}
