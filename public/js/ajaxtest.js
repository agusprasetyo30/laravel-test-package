// @ts-nocheck
$(document).ready(function() {
   // Tombol tambah ditekan
   $("#btn-add").click(function() {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $.ajax({
         type: 'POST',
         url: '/ajaxTest/add', // URL sesuai dengan route('ajax.store)
         data: {
            task        : $("#frmAddTask input[name=task]").val(),
            description : $("#frmAddTask input[name=description]").val()
         },
         dataType: 'json',
         success: function(data) {
            $("#frmAddTask").trigger("reset");
            $("#frmAddTask .close").click();
            window.location.reload();
         },
         error: function(data) {
            var errors = $.parseJSON(data.responseText);
            $("#add-task-error").html('');
            $.each(errors.messages, function(key, value) {
               $('#add-task-errors').append('<li>' + value + '</li>');
            });
            $("#add-error-bag").show();
         }
      });
   });

   // Tombol edit ditekan
   $("#btn-edit").click(function() {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $.ajax({
         type: 'PUT',
         url : "/ajaxTest/" + $("#frmEditTask input[name=edit-task-id]").val() , // mengambil inputan ID
         data: {
            task        : $("#frmEditTask input[name=edit-task]").val(), // mengambil inputan task
            description : $("#frmEditTask input[name=edit-description]").val() // mengambil inputan description
         },
         dataType: 'json',
         success: function(data) {
            $("#frmEditTask").trigger("reset");
            $("#frmEditTask .close").click();
            window.location.reload();
         },
         error: function(data) {
            var errors = $.parseJSON(data.responseText);
            
            $('#edit-task-erorrs').html('');
            $.each(errors.messages, function(key, value) {
               $('#edit-task-errors').append('<li>' + value + '</li>');
            });
            $('#edit-error-bag').show();
         }
      })
   });

   // Tombol hapus ditekan
   $('#btn-delete').click(function() {
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $.ajax({
         type: 'DELETE',
         url: '/ajaxTest/' + $('#frmDeleteTask input[name=delete-task-id]').val(),
         dataType: 'json',
         success: function(data) {
            $('#frmDeleteTask .close').click(); // keadaan jika sukses maka secara otomatis akan memanggil class '.close'
            window.location.reload();
         },
         error: function(data) {
            console.log(data);
         }
      });
   });
});

// menampilkan form modal tambah
function addTaskForm() 
{
   $(document).ready(function() {
      $("#add-error-bag").hide();
      $('#addTaskModal').modal('show');
   });
}

// menampilkan form modal edit
function editTaskForm(id_task)
{
   $.ajax({
      type: 'GET',
      url: '/ajaxTest/' + id_task,
      success: function(data) {
         $('#edit-error-bag').hide();
         $('#frmEditTask input[name=edit-task]').val(data.data.task); // data kedua diambil dari response controller
         $('#frmEditTask input[name=edit-description]').val(data.data.description);
         $("#frmEditTask input[name=edit-task-id]").val(data.data.id);
         $('#editTaskModal').modal('show');
      },
      error: function(data) {
         console.log(data);
      }
   });
}

// menampilkan form modal delete
function deleteTaskForm(task_id)
{
   console.log(task_id);
   $.ajax({
      type : 'GET',
      url : '/ajaxTest/' + task_id,
      success: function(data) { // data : akan mereturn respon yang dikirim oleh controller
         console.log(data);
         $("#frmDeleteTask #delete-title").html("Delete Task ( " + data.data.task + " )?");
         $("#frmDeleteTask input[name=delete-task-id]").val(data.data.id);
         $("#deleteTaskModal").modal("show");
      },
      error: function(data) {
         console.log(data);
      } 
   });
}