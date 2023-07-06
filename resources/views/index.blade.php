@extends('master')

@section('content')

<h1>hai</h1>

@endsection

@section('js-page')
<script>
    function sendLocationToController() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
    } else {
        console.log("Geolocation is not supported by this browser.");
    }
    }

    function successCallback(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    console.log(latitude + " " + longitude);

    // Kirim data ke controller melalui AJAX atau form submission
    // Contoh menggunakan AJAX dengan jQuery
    $.ajax({
        url: '/',
        method: 'POST',
        data: {
            _token: {{ csrf_token() }}, // Tambahkan token CSRF untuk keamanan
            latitude: latitude,
            longitude: longitude
        },
        success: function(response) {
        // Tanggapan dari controller
        console.log(response);
        },
        error: function(xhr, status, error) {
        console.log(error);
        }
    });
    }

    function errorCallback(error) {
    console.log("Error occurred while retrieving location: " + error.message);
    }

    // Panggil fungsi saat halaman dimuat
    sendLocationToController();
</script>
@endsection