@if (Session::has('alert.config'))
    @if(config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif

    <script src="{{ $cdn ?? asset('vendor/sweetalert/js/sweetalert.all.js')  }}"></script>
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>

{{-- @else --}}
    {{-- <link rel="stylesheet" href="{{ asset('vendor/sweetalert/css/sweetalert2.min.css') }}"> --}}

    {{-- <script src="{{ asset('vendor/sweetalert/js/sweetalert2.min.js') }}"></script> --}}

@endif
