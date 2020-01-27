@extends('alert.layouts.app')

@section('content')
   <div class="container mt-5" style="background: lightgray;">
      <div class="row">
         <div class="col-md-12">
            <ul class="nav justify-content-center">
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-success mr-2" href="{{ route('alert.index', ['alert' => 'success']) }}">Success Alert</a>
               </li>
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-warning mr-2" href="{{ route('alert.index', ['alert' => 'warning']) }}">Warning Alert</a>
               </li>
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-info mr-2" href="{{ route('alert.index', ['alert' => 'info']) }}">Info Alert</a>
               </li>
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-danger mr-2" href="{{ route('alert.index', ['alert' => 'error']) }}">Error Alert</a>
               </li>
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-default mr-2" href="{{ route('alert.index', ['alert' => 'question']) }}">Question Alert</a>
               </li>
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-dark mr-2" href="{{ route('alert.index', ['alert' => 'toast']) }}">Toast Alert</a>
               </li>
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-dark" href="{{ route('alert.index', ['alert' => 'animate']) }}">Alert + Animate</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
@endsection