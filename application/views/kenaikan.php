        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-title"><h4>Kenaikan Kelas</h4></div>
                            <div class="card-body">
                                
                                <form>
                                        <div class="form-row">
                                            <div class="col" hidden>
                                              <input type="text" value="<?php echo $tahun_ajaran->id_tahun_ajaran ?>" id="tahun" name="id_tahun_ajaran" class="form-control">
                                            </div>
                                            <div class="col">
                                              <select name="id_tingkat" id="tingkat"  class="form-control">
                                                    <option value="">-- Pilih Tingkat --</option>
                                                    <?php
                                                    foreach($tingkat as $ting){
                                                    ?>
                                                    <option value="<?php echo $ting->id_tingkat ?>"><?php echo $ting->tingkat ?></option>
                                                    <?php
                                                    }
                                                    ?>    
                                                    </select>
                                            </div>
                                            <div class="col">
                                              <select name="id_jurusan" id="jurusan"  class="form-control">
                                                    <option value="">-- Pilih Jurusan --</option>
                                                    <?php
                                                    foreach($jurusan as $jur){
                                                    ?>
                                                    <option value="<?php echo $jur->id_jurusan ?>"><?php echo $jur->jurusan ?></option>
                                                    <?php
                                                    }
                                                    ?>    
                                                    </select>
                                            </div>

                                            <div class="col">
                                                <select class="form-control" name="id_kelas" id="kelas" required>
                                                  <option value="">-- Pilih Tingkat & jurusan Terlebih Dahulu --</option>
                                                </select>
                                            </div>

                                            <div class="col">
                                              <select name="naik_tingkat" id="naik_tingkat"  class="form-control">
                                                    <option value="">-- Naik Ke Tingkat --</option>
                                                    <?php
                                                    foreach($tingkat as $ting){
                                                    ?>
                                                    <option value="<?php echo $ting->id_tingkat ?>"><?php echo $ting->tingkat ?></option>
                                                    <?php
                                                    }
                                                    ?>    
                                                    </select>
                                            </div>

                                            <div class="col">
                                              <input type="button" id="btnTampil" onclick="tampil_siswa();"  class="btn btn-info btn-flat form-control" value="Tampilkan">
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                            </div>
                        </div>
                    </div>



                    




                </div>
            </div>
        </div>