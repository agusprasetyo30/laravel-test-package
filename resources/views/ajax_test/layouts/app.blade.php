<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>AJAX</title>
   <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
   @stack('css')
</head>
<body>
   @yield('content')


   @include('ajax_test.partials.ajax_add')
   @include('ajax_test.partials.ajax_delete')
   @include('ajax_test.partials.ajax_edit')
   
   <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('vendor/popperjs/popper.min.js')  }}"></script>   
   <script type="text/javascript" src="{{ asset('js/ajaxtest.js') }}"></script>
   
   @stack('js')
</body>
{{-- <footer>
   <div class="col-md-12 bg-danger">
      <div class="container">
         <div class="pt-2 pb-2 text-white">
            Test Footer
         </div>
      </div>
   </div>
</footer> --}}
</html>