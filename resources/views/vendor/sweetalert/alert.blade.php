@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif

    {{-- Dicoment dikarenakan di jadikan global agar semua dapat mengakses dan dibuat custom --}}
    {{-- <script src="{{ $cdn ?? asset('vendor/sweetalert/js/sweetalert.all.js')  }}"></script> --}}
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>

@endif
