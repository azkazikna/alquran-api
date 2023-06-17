@extends('master')

@section('content')

@livewire('list-surah')

@endsection

@section('js-page')
<script>
    window.addEventListener('load', function() {
        var cardRows = document.querySelectorAll('.card-equal-height .card-body');

        function setCardHeight() {
            var maxHeight = 0;
            cardRows.forEach(function(row) {
                maxHeight = Math.max(maxHeight, row.offsetHeight);
            });
            cardRows.forEach(function(row) {
                row.style.height = maxHeight + 'px';
            });
        }

        setCardHeight();
        window.addEventListener('resize', setCardHeight);
    });
</script>
@endsection