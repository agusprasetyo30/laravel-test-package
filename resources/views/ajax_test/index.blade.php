@extends('ajax_test.layouts.app')

@push('css')
   <style>
      .table-title {
         padding: 20px;
         background: #435D7D;
         color: white;
      }

      .table-title div a {
         float: right;
      }
   </style>
@endpush

@section('content')
<div class="container mt-5">
   <div class="table-wrapper">
      <div class="table-title">
         <div class="row">
            <div class="col-sm-6">
               <h2>Manage <b>Tasks</b></h2>
            </div>
            <div class="col-sm-6">
               <a onclick="event.preventDefault(); addTaskForm();" href="#" class="btn btn-success ml-2" data-toggle="modal"><i class="fas fa-plus-circle mr-2"></i> <span>Add New Task</span></a>                       
               <a href="{{ route('home') }}" class="btn btn-primary"><i class="fas fa-undo mr-2"></i>Kembali</a>
            </div>
         </div>
      </div>
      <table class="table table-striped table-hover table-bordered">
         <thead>
            <tr>
               <th>ID</th>
               <th>Task</th>
               <th>Description</th>
               <th>Created At</th>
               <th>Done</th>
               <th>Actions</th>
            </tr>
         </thead>
         <tbody>
            @foreach($data as $task)
            <tr>
               <td>{{$task->id}}</td>
               <td>{{$task->task}}</td>
               <td>{{$task->description}}</td>
               <td>{{$task->created_at}}</td>
               <td class="text-center">{{($task->done) ? 'Yes' : 'No'}}</td>
               <td class="text-center">
                  <a onclick="event.preventDefault(); editTaskForm({{ $task->id }});" href="#" class="edit open-modal mr-3" data-toggle="modal" value="{{$task->id}}"><i class="fas fa-pencil-alt" data-toggle="tooltip" title="Edit"></i></a>
                  <a onclick="event.preventDefault(); deleteTaskForm({{ $task->id }});" href="#" class="delete" data-toggle="modal"><i class="fas fa-trash-alt" data-toggle="tooltip" title="Delete"></i></a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      <div class="clearfix">
         {{ $data->links() }}
         <div class="hint-text">Showing <b>{{$data->count()}}</b> out of <b>{{$data->total()}}</b> entries</div>
      </div>
   </div>
</div>
@endsection

@push('js')
   <script>
      
   </script>
@endpush