<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ListDoa extends Component
{
    public $search;

    public function render()
    {
        $response = Http::get("https://doa-doa-api-ahmadramadhan.fly.dev/api");

        if($response->ok())
        {
            $data = $response->json();

            $pattern = "/$this->search/i";

            // Mencari array berdasarkan pola menggunakan preg_grep
            $filteredData = array_filter($data, function ($item) use ($pattern) {
                return preg_match($pattern, $item['doa']);
            });

            // dd($filteredData);

            return view('livewire.list-doa', [
                'data' => $filteredData
            ]);
        } else {
            dd('gagal koneksi');
        }
    }
}
