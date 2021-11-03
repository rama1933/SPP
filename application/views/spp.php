        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data SPP</h4>
                                <div class="table-responsive m-t-40">
                                    <button type="button" onclick="btntambah()" class="btn btn-success m-b-10 m-l-5">Tambah SPP</button>
                                    <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Tahun Ajaran</th>
                                                <th>Tingkat</th>
                                                <th>Jurusan</th>
                                                <th>Sejumlah</th>
                                                <th>Bulan</th>
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
    Form Tambah SPP
  </div>
 
  <div class="scrolling content">
       <form class="ui form" id="formtambah">
          <div class="field">
            <div class="ui pointing below label">
            Tahun Ajaran
            </div> 
            <input type="text" name="tahun" value="<?php echo $tahun->tahun ?>" readonly required>
          </div>

        <div class="field">
	          <div class="ui pointing below label">
	              Tingkat
	          </div> 
	          <select name="id_tingkat" class="ui search dropdown" required>
	              <option value="">- Pilih Tingkat-</option>
	              <?php 
	              foreach($tingkat as $ting){
	              ?>
	              <option value="<?php echo $ting->id_tingkat ?>"><?php echo $ting->tingkat ?></option>
	              <?php
	              }
	              ?>
	          </select>
        </div>
        <div class="field">
	          <div class="ui pointing below label">
	              Jurusan
	          </div> 
	          <select name="id_jurusan" class="ui search dropdown" required>
	              <option value="">- Pilih Jurusan -</option>
	              <?php 
	              foreach($jurusan as $jur){
	              ?>
	              <option value="<?php echo $jur->id_jurusan ?>"><?php echo $jur->jurusan ?></option>
	              <?php
	              }
	              ?>
	          </select>
        </div>
        <div class="field">
            <div class="ui pointing below label">
            Sejumlah
            </div> 
            <input type="text" name="jumlah" placeholder="Masukkan Jumlah" id="rupiah" required>
        </div>

  </div>
          <div class="actions">
    <div class="ui cancel button">Cancel</div>
    <button class="ui primary button" type="submit">Save</button>
  </div>
  </form>
</div>


