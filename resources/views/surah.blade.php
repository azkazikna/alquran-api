@extends('master')

@section('content')
    @livewire('list-ayat', ['nomor' => $nomor])
@endsection

    @section('js-page')
    <script>
        
        function playAudioAyat(nomor) {
            var audio = document.getElementById("audio-ayat-" + nomor);

            if (audio.paused) {
                audio.play();
            } else {
                audio.pause();
            }
        }
        
        function playAudioSurah() {
            var audio = document.getElementById("audio-surah");
            audio.play();
        }

        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })

    </script>
    @endsection

