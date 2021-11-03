        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                <div class="row">
                    
                    <div class="col-lg-4">
                        <div class="card">
                        <div id="image-holder">
              
                        </div>           
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-title"><h4>Form Tambah Siswa</h4></div>
                            <div id="notifikasi"><?php echo $this->session->flashdata('message'); ?></div>
                            <div class="card-body">
                                <form action="<?php echo base_url()?>Siswa/tambah" method="POST" enctype="multipart/form-data">
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input type="text" name="NIS" class="form-control" placeholder="Masukkan NIS" onkeypress="return hanyaAngka(event)" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" required>
                                            </div>
                                        </div>

                                         <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text" name="tmpt_lhr" class="form-control" placeholder="Masukkan Tempat Lahir" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" name="tgl_lhr" class="form-control" placeholder="Masukkan Tanggal Lahir" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <div class="form-check">
                                              <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="L" required>
                                              <label class="form-check-label" for="inlineRadio1">Laki-laki</label>
                                            </div>
                                            <div class="form-check">
                                              <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="P" required>
                                              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                            </div>
                                            </div>                                            
                                            
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat" required></textarea>
                                            </div>
                                        </div>

                                        <div class="col-sm-6" hidden>
                                            <div class="form-group">
                                                <label>Tahun Ajaran</label>
                                                <input type="text" name="id_tahun_ajaran" class="form-control" value="<?php echo $tahun->id_tahun_ajaran ?>" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tingkat</label>
                                                <select class="form-control" id="tingkat" name="id_tingkat" required>
                                                  <option value="">-- Pilih Tingkat --</option>
                                                  <?php
                                                  foreach($tingkat as $ting){
                                                  ?>
                                                  <option value="<?php echo $ting->id_tingkat ?>"><?php echo $ting->tingkat ?></option>
                                                  <?php } ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select class="form-control" name="id_kelas" id="kelas" required>
                                                  <option value="">-- Pilih Tingkat Terlebih Dahulu --</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Foto Siswa</label>
                                                <input type="file" name="foto" id="fileUpload" required>
                                            </div>
                                        </div>






                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" class="btn btn-success">Save</button>
                                        <button type="reset" class="btn btn-inverse">Reset</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->