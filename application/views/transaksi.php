        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    <h4>Transaksi SPP</h4>
                                </div>
                                <form>
                                    <div class="row">

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>Tahun Ajaran</label>
                                                <input type="hidden" name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-control" value="<?php echo $tahun->id_tahun_ajaran ?>" readonly required>
                                                <input type="text" name="tahun" class="form-control" value="<?php echo $tahun->tahun ?>" readonly required>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input type="text" name="NIS" id="NIS" class="form-control" placeholder="Masukkan NIS" onkeypress="return hanyaAngka(event)" autofocus required > 
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <input type="button" id="btnSiswa" onclick="check_siswa();"  class="btn btn-primary btn-flat m-b-30 m-t-30" value="Lihat">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End PAge Content -->


                <div id="spp">
                        
                </div>


            </div>
            <!-- End Container fluid  -->
        </div>
        <!-- End Page wrapper  -->