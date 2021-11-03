        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Jurusan</h4>
                                <div class="table-responsive m-t-40">
                                    <button type="button" onclick="btntambah()" class="btn btn-success m-b-10 m-l-5">Tambah Jurusan</button>
                                    <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Jurusan</th>
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
    Form Tambah Jurusan
  </div>
 
  <div class="scrolling content">
       <form class="ui form" id="formtambah">
          <div class="field">
            <div class="ui pointing below label">
            Nama Jurusan
            </div> 
            <input type="text" name="jurusan" placeholder="Masukkan Nama Jurusan" required>
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
    Form Edit Jurusan
  </div>
 
  <div class="scrolling content">
       <form class="ui form" id="formedit">
        <div class="field" hidden>
            <div class="ui pointing below label">
            ID
            </div> 
            <input type="text" name="id_jurusan">
          </div>
          <div class="field">
            <div class="ui pointing below label">
            Nama Jurusan
            </div> 
            <input type="text" name="jurusan" required>
          </div>

  </div>
          <div class="actions">
    <div class="ui cancel button">Cancel</div>
    <button class="ui primary button" type="submit">Save</button>
  </div>
  </form>
</div>

