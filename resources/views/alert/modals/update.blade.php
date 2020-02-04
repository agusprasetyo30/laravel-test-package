<div class="modal fade" id="ajax-modal" data-backdrop="static">
   <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="modalHeading"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form id="productForm" name="productForm" class="form-horizontal">
               @csrf
               <input type="hidden" name="test_id" id="test_id">
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Nama</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="namaEdit" name="namaEdit" placeholder="Masukan Nama" autofocus="on" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">NIM</label>
                     <div class="col-sm-12">
                        <input type="text" class="form-control" id="nimEdit" name="nimEdit" placeholder="Masukan NIM" value="" maxlength="50" required="">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Kelas</label>
                     <div class="col-sm-12">
                        <select name="kelasEdit" id="kelasEdit" class="form-control">
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
                        <textarea id="alamatEdit" name="alamatEdit" required="" placeholder="Masukan Alamat" class="form-control"></textarea>
                     </div>
                  </div>
                  <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes</button>
                  </div>
               </form>
         </div>
      </div>
   </div>
</div>