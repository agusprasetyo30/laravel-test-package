@extends('alert.layouts.app')

@section('content')
<div class="container mt-5 text-center " >
   <h2>Alert Test</h2>
   <a href="{{ route('home') }}" class="btn btn-primary mb-2">
      Kembali
   </a>
   <div class="row" style="background: lightgray;">
      <div class="col-md-12">
         <ul class="nav justify-content-center">
               <li class="nav-item pt-3 pb-3">
                  <a class="nav-link btn btn-outline-dark mr-2" href="{{ route('alert.index') }}" >Default</a>
               </li>
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

   <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
         <div class="col-md-4">
            
            <h4 class="text-center">Test Input</h4>

            <div class="card">
               <div class="card-header bg-primary text-white">
                  <h5 class="card-title text-left mb-0">Input Mahasiswa</h5>
               </div>

               <div class="card-body">
                  <form action="{{ route('alert.add') }}" method="post">
                     @csrf
                     <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" autofocus="on" class="form-control" value="{{ old('nama') }}" required>
                     </div>
                     <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" id="nim" autofocus="on" class="form-control" value="{{ old('nim') }}" required>
                     </div>
                     <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" name="kelas" id="kelas" autofocus="on" class="form-control" value="{{ old('kelas') }}" required>
                     </div>
                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="3" autofocus="on" class="form-control" required>{{ old('alamat') }}</textarea>
                     </div>

                     <div class="col-md-12 text-right">
                        <input type="submit" value="Simpan" class="btn btn-success">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-8">
            <h4 class="text-center">Data Tabel</h4>

            <table class="table table-bordered table-hover table-striped">
               <thead>
                  <tr class="text-center">
                     <th>#</th>
                     <th>Nama</th>
                     <th>NIM</th>
                     <th>Kelas</th>
                     <th>Alamat</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  @php
                     $nomer = 1;
                  @endphp
                  @foreach ($data['tabel'] as $item)
                  <tr>
                     <td class="align-middle">{{ $nomer++ }}. </td>
                     <td class="align-middle">{{ $item->nama }}</td>
                     <td class="align-middle">{{ $item->nim }}</td>
                     <td class="align-middle text-center" style="width: 100px">{{ $item->kelas }}</td>
                     <td class="align-middle">{{ $item->alamat }}</td>
                     <td class="align-middle">
                        <div class="btn-group">
                           <a href="#" class="btn btn-warning btn-sm">Edit</a>
                           <a>
                              <button class="btn btn-danger btn-sm" onclick="deleteData({{ $item->id }})" type="submit">Hapus</button>
                           </a>
                        </div>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>

         </div>
      </div>
   </div>

@endsection
   
@push('js')
   <script>
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      
      function deleteData(id) {
         // Mengambil parameter
         var dataUrl = '{{ route("alert.destroy", ":id") }}';
         dataUrl = dataUrl.replace(':id', id);

         // Untuk Sweetalert ini dibuat default : sweetalert.all.js
         // Bawaan package realrashid sweetalert laravel
         Swal.fire({
            icon: 'warning', // mengikuti package, biasanya secara default itu ' type '
            title: "Are you sure ?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            showCancelButton: true,
            cancelButtonText: 'Batal',
            confirmButtonText: 'Hapus data',
            allowOutsideClick: false,
            allowEscapeKey: false,
            confirmButtonColor: '#d0211c',
            cancelButtonColor: '#38C172'
         })
         .then((result) => {
            if (result.value) {
               $.ajax({
                  url: dataUrl,
                  type: "GET",
                  success: function () {
                     Swal.fire({
                        icon: 'success',
                        text: 'Data berhasil dihapus'
                     }).then(function(){
                        location.reload();
                     });
                  },
                  error: function () {
                     Swal.fire({
                        title: 'Oops ...',
                        icon: 'error',
                        text: 'something wrong . . .',
                        timer: '1500',
                     });
                  },
               })
            }
         });
      }
   </script>
@endpush

