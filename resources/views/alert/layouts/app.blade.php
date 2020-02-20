<!DOCTYPE html>
<html lang="en">
<head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Sweetalert & Modal</title>
   <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/animatecss/animate.css') }}">
   <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">

   @stack('css')
   {{-- <link rel="stylesheet" href="{{ asset('vendor/sweetalert/css/sweetalert2.min.css') }}"> --}}
</head>
<body>
   <header>
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary pr-5 pl-5">
         <a class="navbar-brand" href="#">SweetAlert2 + AJAX + Modal Test + Notification</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         
         @auth         
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav ml-auto" >
                  <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="fas fa-globe mr-2"></span>
                        Notification <span class="badge badge-light">10</span>
                     </a>
                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                     </div>
                  </li>
                  <li class="nav-item ml-2 mr-5 ">
                     <a class="nav-link text-white" onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit()" href="{{ route('logout') }}">Logout </a>
                     
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                     </form>
                  </li>
               </ul>
            </div>
         @endauth

         </nav>
   </header>
   @yield('content')

   @include('alert.modals.modal')
   <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
   <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
   <script src="{{ asset('vendor/popperjs/popper.min.js')  }}"></script>

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