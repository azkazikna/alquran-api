<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ListSurah extends Component
{
    public $search;

    public function render()
    {
        $response = Http::get("https://api.quran.com/api/v4/chapters?language=id");

        if($response->ok())
        {
            $data = $response->json();
            $data = $data["chapters"];

            // dd($data);

            $pattern = "/$this->search/i";

            // Mencari array berdasarkan pola menggunakan preg_grep
            $filteredData = array_filter($data, function ($item) use ($pattern) {
                return preg_match($pattern, $item['name_simple']);
            });

            // dd($filteredData);

            return view('livewire.list-surah', [
                'data' => $filteredData
            ]);
        } else {
            dd('gagal koneksi');
        }
    }
}
