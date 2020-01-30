<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>Sweetalert & Modal</title>
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/animatecss/animate.css') }}">
   @stack('css')
   {{-- <link rel="stylesheet" href="{{ asset('vendor/sweetalert/css/sweetalert2.min.css') }}"> --}}
</head>
<body>
   @yield('content')

   <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
   
   {{-- Import manual, mengikusi data di package --}}
   <script src="{{ asset('vendor/sweetalert/js/sweetalert.all.js')  }}"></script>
   
   @include('sweetalert::alert')
   
   @stack('js')

</body>
<footer>
   <div class="col-md-12 bg-danger">
      <div class="container">
         <div class="pt-2 pb-2 text-white">
            Test Footer
         </div>
      </div>
   </div>
</footer>
</html>