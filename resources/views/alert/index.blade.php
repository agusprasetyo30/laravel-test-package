@extends('alert.layouts.app')

@push('css')
   <style>
      select {
         cursor: pointer;
      }

      .pagination {
         display: flex;
         justify-content: center;
      }

      .active {
         background: #007BFF;
         color: white;
         text-decoration: none;
      }

      .active:hover {
         color: white;
      }
   </style>
@endpush

@section('content')
<div class="container mt-5 text-center " >
   <h2>SweetAlert2 + AJAX + Modal Test</h2>
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
            
            <h4 class="text-center mb-4">Test Input</h4>
            <div class="card">
               <div class="card-header bg-primary text-white">
                  <h5 class="card-title text-left mb-0">Input Mahasiswa</h5>
               </div>

               <div class="card-body">
                  <form action="{{ route('alert.add') }}" method="post">
                     @csrf
                     <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" autofocus="on" autocomplete="off" placeholder="Masukan nama . . ." 
                           class="form-control" value="{{ old('nama') }}" required>
                     </div>
                     <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" id="nim" autofocus="on" autocomplete="off" placeholder="Masukan NIM . . ." 
                           class="form-control" value="{{ old('nim') }}" required>
                     </div>
                     <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control">
                           <option value="" disabled selected>Pilih Kelas</option>
                           <option value="MI-3A">MI-3A</option>
                           <option value="MI-3B">MI-3B</option>
                           <option value="MI-3C">MI-3C</option>
                           <option value="MI-3D">MI-3D</option>
                           <option value="MI-3E">MI-3E</option>
                           <option value="MI-3F">MI-3F</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="3" autofocus="on" placeholder="Masukan Alamat . . ."
                           class="form-control" required>{{ old('alamat') }}</textarea>
                     </div>

                     <div class="col-md-12 text-right">
                        <input type="submit" value="Simpan" class="btn btn-success">
                     </div>
                  </form>
               </div>
            </div>
         </div>
         <div class="col-md-8">
            <h4 class="text-center mb-4">Data Tabel</h4>
            <a href="#" class="btn btn-success float-right mb-2" onclick="event.preventDefault(); showModalAdd()"><i class="fas fa-plus mr-2"></i>Tambah Data Modal</a>
            <ul class="nav ">
               <li class="nav-item">
                  <a class="nav-link {{ Request::get('type') == null ? 'active' : '' }}" href="{{ route('alert.index') }}">Default</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ Request::get('type') == 'delete' ? 'active' : '' }}" href="{{ route('alert.index', ['type' => 'delete']) }}">Show Delete Data</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link {{ Request::get('type') == 'all-delete' ? 'active' : '' }}" href="{{ route('alert.index', ['type' => 'all-delete']) }}">Show All with delete</a>
               </li>
            </ul>
            
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
                  @foreach ($data['tabel'] as $item)
                     @if ($item->trashed() && Request::get('type') == 'all-delete')
                        <tr class="bg-warning">
                           <td class="align-middle ">{{ $numberTest++ }}. </td>
                           <td class="align-middle">{{ $item->nama }}</td>
                           <td class="align-middle">{{ $item->nim }}</td>
                           <td class="align-middle text-center" style="width: 100px">{{ $item->kelas }}</td>
                           <td class="align-middle">{{ $item->alamat }}</td>
                           <td class="align-middle text-center">
                              <div class="btn-group-vertical">
                                 <a href="{{ route('alert.restore', ['id', $item->alamat]) }}" class="btn btn-success btn-sm">Restore</a>
                                 <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); permanentDelete({{ $item->id }})">
                                    Force Del
                                 </a>
                              </div>
                           </td>
                        </tr>
                     @else
                        <tr>
                           <td class="align-middle ">{{ $numberTest++ }}. </td>
                           <td class="align-middle">{{ $item->nama }}</td>
                           <td class="align-middle">{{ $item->nim }}</td>
                           <td class="align-middle text-center" style="width: 100px">{{ $item->kelas }}</td>
                           <td class="align-middle">{{ $item->alamat }}</td>
                           @if ($item->trashed())
                              <td class="align-middle text-center">
                                 <div class="btn-group-vertical">
                                    <a href="{{ route('alert.restore', ['id' => $item->id]) }}" class="btn btn-success btn-sm">Restore</a>
                                    <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); permanentDelete({{ $item->id }})">
                                       Force Del
                                    </a>
                                 </div>
                              </td>
                           @else
                              <td class="align-middle text-center">
                                 <div class="btn-group-vertical">
                                    <a href="javascript:void(0)" onclick="event.preventDefault();showEditModal({{ $item->id }})" class="btn btn-warning btn-sm">Edit</a>
                                    <a>
                                       <button class="btn btn-danger btn-sm" onclick="event.preventDefault();deleteData({{ $item->id }})" type="submit">Hapus</button>
                                    </a>
                                 </div>
                              </td>
                           @endif
                        </tr>
                     @endif
                  @endforeach
               </tbody>
               <tfoot >
                  <tr >
                     <td colspan="6" >
                        <div class="justify-content-center">
                           {{-- Pagination --}}
                           {{ $data['tabel']->appends(Request::all())->links() }}
                           <div class="hint-text">Showing <b>{{$data['tabel']->count()}}</b> out of <b>{{$data['tabel']->total()}}</b> entries</div>
                        </div>
                     </td>
                  </tr>
               </tfoot>
            </table>

         </div>
      </div>
   </div>

@endsection

@push('js')
<script>
   $(document).ready(function() {
      
      // Tombol tambah ditekan
      $('#addBtn').click(function(e) 
      {
         $(this).html('Sending . . .')

         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type : 'POST',
            url  : "/testalert/addAjax",
            data : {
               dataName : $('#frmAddData input[name=dataName]').val(),
               dataNim : $('#frmAddData input[name=dataNim]').val(),
               dataClass : $('#frmAddData #dataClass').val(),
               dataAddress : $('#frmAddData #dataAddress').val(),
            },            
            dataType: 'json',

            success: function(data)
            {
               Swal.fire({
                     icon: 'success',
                     text: 'Tambah data sukses',
                     allowOutsideClick: false,
                     allowEscapeKey: false

                  }).then(function(){
                     $("#frmAddData").trigger("reset");
                     $("#frmAddData .close").click();
                     window.location.reload();
                  });
            },
            error: function(data) {
               var errors = $.parseJSON(data.responseText);
               console.log(errors);
            }
         })
      })

      // Tombol edit ditekan
      $('#editBtn').click(function(e) 
      {
         $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });

         $.ajax({
            type: 'PUT',
            url:  "/testalert/" + $('#frmAddData input[name=data_id]').val(),
            data: {
               dataName : $('#frmAddData input[name=dataName]').val(),
               dataNim : $('#frmAddData input[name=dataNim]').val(),
               dataClass : $('#frmAddData #dataClass').val(),
               dataAddress : $('#frmAddData #dataAddress').val(),
            },
            dataType: 'json',

            success: function(data) {
               $('#frmAddData .close').click();
               $('#frmAddData').trigger('reset');
               window.location.reload();
            }, 
            error : function(data) {
               var errors = $.parseJSON(data.responseText);
               console.log(errors);
            }
         })
      });
   })

   function deleteData(id) 
   {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      // Mengambil parameter
      var dataUrl = '{{ route("alert.destroy", ":id") }}';
      dataUrl = dataUrl.replace(':id', id);

      // Untuk Sweetalert ini dibuat default : sweetalert.all.js
      // Bawaan package realrashid sweetalert laravel
      Swal.fire({
         icon: 'warning', // mengikuti package, biasanya secara default itu ' type '
         title: "Apakah anda yakin ?",
         text: "Jika data dihapus maka akan berpengaruh di pada database!",
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
               type: "DELETE",
               dataType: 'json',
               success: function () {
                  Swal.fire({
                     icon: 'success',
                     text: 'Data berhasil dihapus',
                     allowOutsideClick: false,
                     allowEscapeKey: false
                  }).then(function(){
                     // window.location.reload();
                     window.location.href = "{{ route('alert.index') }}"
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


   function permanentDelete(id)
   {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      Swal.fire({
         icon: 'warning', // mengikuti package, biasanya secara default itu ' type '
         title: "Peringatan!",
         text: "Apakah anda yakin ingin menghapus permanent data ini ?",
         showCancelButton: true,
         cancelButtonText: 'Batal',
         confirmButtonText: 'Hapus data',
         allowOutsideClick: false,
         allowEscapeKey: false,
         confirmButtonColor: '#d0211c',
         cancelButtonColor: '#38C172'
      }).then((result) => {
         if (result.value) {
            $.ajax({
               type: 'GET',
               url: '/testalert/' + id + '/delete',
               dataType: 'json',
               success: function () {
                  Swal.fire({
                     icon: 'success',
                     text: 'Data berhasil dihapus permanen',
                     allowOutsideClick: false,
                     allowEscapeKey: false
                  }).then(function(){
                     window.location.href = "{{ route('alert.index', ['type' => 'delete']) }}"
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
      })
   }


   function showModalAdd()
   {
      $(document).ready(function() {
         $('.modal-header #modalHeading').html("Tambah data modal")
         $("#data_id").hide();
         $('#addBtn').show();
         $('#editBtn').hide();
         $('#modalAddData').modal('show')
      })
   }

   function showEditModal(test_id)
   {

      $(document).ready(function() {
         $.ajax({
            type: 'GET',
            url: "/testalert/" + test_id, // memanggil alert.showAjax
            success: function(data)
            {
               $('.modal-header #modalHeading').html("Edit data modal")
               $('#addBtn').hide();
               $('#editBtn').show();
               $("#data_id").show();
               $('#modalAddData').modal('show')

               $('#frmAddData input[name=data_id]').val(data.data.id)
               $('#frmAddData input[name=dataName]').val(data.data.nama)
               $('#frmAddData input[name=dataNim]').val(data.data.nim)
               $('#frmAddData #dataClass').val(data.data.kelas)
               $('#frmAddData #dataAddress').val(data.data.alamat)
            },
            error : function(data)
            {
               console.log(data);
            }
         })
      })
   }


   $('#close').click(function() {
      console.log("tombol close ditekan");
      $("#frmAddData").trigger("reset");
   });

</script>
@endpush

