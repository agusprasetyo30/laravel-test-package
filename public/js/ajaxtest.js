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
         url : "/ajaxTest/" + $("#frmEditTask input[name=edit-task-id]").val() ,
         data: {
            task        : $("#frmEditTask input[name=edit-task]").val(),
            description : $("#frmEditTask input[name=edit-description]").val()
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
   })
});

// menampilkan form tambah
function addTaskForm() 
{
   $(document).ready(function() {
      $("#add-error-bag").hide();
      $('#addTaskModal').modal('show');
   });
}

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
   })
}