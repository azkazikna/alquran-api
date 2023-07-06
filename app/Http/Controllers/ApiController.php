<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    public function index()
    {  
        // $_SERVER["REMOTE_ADDR"]
        if ($position = geoip()->getLocation('182.253.127.212')) {
            // Successfully retrieved position.
            // dd($position);
            $response_kota = Http::get("https://api.myquran.com/v1/sholat/kota/cari/$position->city");
            
            if($response_kota->ok()) {
                $data_kota = $response_kota->json();
                $id_kota = $data_kota["data"][0]["id"];

                $today = Carbon::today()->format('Y-m-d');
                $today = explode('-', $today);
                
                $response_jadwal = Http::get("https://api.myquran.com/v1/sholat/jadwal/$id_kota/$today[0]/$today[1]/$today[2]");

                if($response_jadwal->ok())
                {
                    $data_jadwal = $response_jadwal->json();
                    return view('index');

                } else {
                    dd("gagal koneksi api");
                }
            } else {
                dd("gagal koneksi api");
            }
        } else {
            dd("gagal dapet alamat");
        }
    }
}
