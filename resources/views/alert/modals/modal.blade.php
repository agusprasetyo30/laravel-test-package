<div class="modal fade" id="modalAddData" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="modalHeading"></h4>
            <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close">

               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="frmAddData" class="form-horizontal">
               <input type="hidden" name="data_id" id="data_id">
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Nama</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="dataName" name="dataName" placeholder="Masukan Nama" autofocus="on" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="data-nim" class="col-sm-2 control-label">NIM</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="dataNim" name="dataNim" placeholder="Masukan NIM" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="data-class" class="col-sm-2 control-label">Kelas</label>
                     <div class="col-sm-12">
                        <select name="dataClass" id="dataClass" class="form-control">
                           <option value="" disabled selected>Pilih Kelas</option>
                           <option value="MI-3A">MI-3A</option>
                           <option value="MI-3B">MI-3B</option>
                           <option value="MI-3C">MI-3C</option>
                           <option value="MI-3D">MI-3D</option>
                           <option value="MI-3E">MI-3E</option>
                           <option value="MI-3F">MI-3F</option>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label class="col-sm-2 control-label">Alamat</label>
                     <div class="col-sm-12">
                        <textarea id="dataAddress" name="dataAddress" required="" placeholder="Masukan Alamat" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-12 text-right">
                     <button class="btn btn-success" type="button" id="addBtn" value="create">Simpan</button>
                     <button class="btn btn-primary" type="button" id="editBtn" value="update">Update</button>
                  </div>
               </form>
         </div>
      </div>
   </div>
</div>