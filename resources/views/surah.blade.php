@extends('master')

@section('content')
    @livewire('list-ayat', ['id_surah' => $id_surah])
@endsection

@section('js-page')
<script>
    
    function playAudioAyat(nomor) {
        var audio = document.getElementById("audio-ayat-" + nomor);
        var icon = document.getElementById("play-icon-" + nomor);

        if (audio.paused) {
            audio.play();
            icon.classList.remove("fa-play");
            icon.classList.add("fa-pause");
        } else {
            audio.pause();
            icon.classList.remove("fa-pause");
            icon.classList.add("fa-play");
        }

        audio.addEventListener("ended", function() {
            icon.classList.remove("fa-pause");
            icon.classList.add("fa-play");
        });
    }
    
    function playAudioSurah() {
        var audio = document.getElementById("audio-surah");
        audio.play();
    }
    
    function playAudioWord(nomor) {
        var audio = document.getElementById("audio-kata-" + nomor);
        audio.play();
    }
    $(document).ready(function() {
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    });


</script>
@endsection

