<!-- Edit Modal HTML -->
<div class="modal fade" id="editTaskModal">
   <div class="modal-dialog">
      <div class="modal-content">
         <form id="frmEditTask">
            <div class="modal-header">
               <h4 class="modal-title">
                  Edit Task
               </h4>
               <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                  x
               </button>
            </div>
            <div class="modal-body">
               <div class="alert alert-danger" id="edit-error-bag">
                  <ul id="edit-task-errors">
                  </ul>
               </div>
               <div class="form-group">
                  <label>
                     Task
                  </label>
                  <input class="form-control" id="edit-task" name="edit-task" required="" type="text">
               </div>
               <div class="form-group">
                  <label>
                     Description
                  </label>
                  <input class="form-control" id="edit-description" name="edit-description" required="" type="text">
               </div>
            </div>
            <div class="modal-footer">
               <input id="edit-task-id" name="edit-task-id" type="text" value="0">
                  <input class="btn btn-default" data-dismiss="modal" type="button" value="Cancel">
                     <button class="btn btn-info" id="btn-edit" type="button" value="add">
                           Update Task
                     </button>
                  </input>
               </input>
            </div>
         </form>
      </div>
   </div>
</div>