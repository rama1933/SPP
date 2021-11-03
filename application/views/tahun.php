        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Tahun Ajaran</h4>
                                <div class="table-responsive m-t-40">
                                    <button type="button" onclick="btntambah()" class="btn btn-success m-b-10 m-l-5">Tambah Tahun</button>
                                    <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tahun</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->


<div class="ui basic mini modal" id="ModalTambah">
  <div class="header">
    Form Tambah Tahun Ajaran
  </div>
 
  <div class="scrolling content">
       <form class="ui form" id="formtambah">
          <div class="field">
            <div class="ui pointing below label">
            Tahun Ajaran
            </div> 
            <input type="text" name="tahun" placeholder="Contoh : 2017/2018" required>
          </div>
          <div class="field">
          <div class="ui pointing below label">
              Status
          </div> 
          <select name="status" class="ui search dropdown" required>
              <option value="">- Pilih Status-</option>
              <option value="Y">Aktif</option>
              <option value="T">Tidak Aktif</option>
              </select>
        </div>

  </div>
          <div class="actions">
    <div class="ui cancel button">Cancel</div>
    <button class="ui primary button" type="submit">Save</button>
  </div>
  </form>
</div>

<div class="ui basic mini modal" id="ModalEdit">
  <div class="header">
    Form Edit Tahun Ajaran
  </div>
 
  <div class="scrolling content">
       <form class="ui form" id="formedit">
        <div class="field" hidden>
            <div class="ui pointing below label">
            ID
            </div> 
            <input type="text" name="id_tahun_ajaran" placeholder="Contoh : 2017/2018" required>
          </div>
          <div class="field">
            <div class="ui pointing below label">
            Tahun Ajaran
            </div> 
            <input type="text" name="tahun" placeholder="Contoh : 2017/2018" required>
          </div>
          <div class="field">
          <div class="ui pointing below label">
              Status
          </div> 
          <select name="status" class="ui search dropdown" required>
              <option value="">- Pilih Status-</option>
              <option value="Y">Aktif</option>
              <option value="T">Tidak Aktif</option>
              </select>
        </div>

  </div>
          <div class="actions">
    <div class="ui cancel button">Cancel</div>
    <button class="ui primary button" type="submit">Save</button>
  </div>
  </form>
</div>

