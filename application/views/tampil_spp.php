
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">

                            	<img class="img-responsive img-circle container" style="max-height: 100px; max-width:100%;text-align: :center;"  src="<?php echo base_url()?>foto_siswa/<?php echo $informasi->foto ?>">

                            	<h3 class="profile-username text-center"><?php echo $informasi->nama ?></h3>
                            	<p class="text-muted text-center"><?php echo $informasi->NIS ?></p>
                            	<ul class="list-group list-group-unbordered">
					                <li class="list-group-item">
					                  <b>Kelas</b> <a class="pull-right"><?php echo $informasi->kelas ?></a>
					                </li>
					                <li class="list-group-item">
					                  <b>Jurusan</b> <a class="pull-right"><?php echo $informasi->jurusan ?></a>
					                </li>
					                <li class="list-group-item">
					                  <b>Tingkat</b> <a class="pull-right">
					                    <?php if($informasi->tingkat == 'X'){
					                      echo $informasi->tingkat." (Sepuluh)";
					                    }else if($informasi->tingkat == 'XI'){
					                      echo $informasi->tingkat." (Sebelas)";
					                    }else if ($informasi->tingkat == 'XII') {
					                      echo $informasi->tingkat." (Dua Belas)";
					                    } ?>
					                    </a>
					                </li>
					                <li class="list-group-item">
					                  <b>Tahun Ajaran</b> <a class="pull-right"><?php echo $informasi->tahun ?></a>
					                </li>
					              </ul>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8">
                        <div class="card">
                        	<div class="card-body">
                        		<div class="table-responsive">
                                    <table class="table table-hover table-striped" >
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">#</th>
                                                <th style="text-align: center">Nama Bulan</th>
                                                <th style="text-align: center">Tagihan</th>
                                                <th style="text-align: center">Status</th>
                                                <th style="text-align: center">Bayar</th>
                                                <th style="text-align: center">Cetak</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	$no=1; 
						                    foreach($bayar as $data){
						                    ?>
						                    <tr>
						                    	<td style="text-align: center"><?php echo $no++ ?></td>
						                    	<td style="text-align: center"><?php echo $data->bulan ?></td>
						                    	<td style="text-align: center"><?php echo "Rp.".number_format($data->jumlah) ?></td>
						                    	<td style="text-align: center">
						                    		<?php if ($data->status=='Lunas') {
						                    		?>
						                    		<p class="text-primary">
						                    			<?php echo $data->status ?>
						                    			
						                    		</p>
						                    		<?php
						                    		}else{
						                    		?>
						                    		<p class="text-danger">
						                    			<?php echo $data->status ?>
						                    			
						                    		</p>
						                    		<?php } ?>
						                    	</td>
						                    	<td style="text-align: center">
						                    		<?php if ($data->status=='Belum Lunas') {
						                    		?>
						                    		<form method="POST" action="<?php echo base_url()?>Transaksi/bayar_spp">
						                    			<input type="hidden" name="NIS" id="NIS" value="<?php echo $informasi->NIS ?>" class="form-control"/>
						                    			<input type="hidden" name="id_spp" id="id_spp" value="<?php echo $data->id_spp ?>" class="form-control"/>
						                    			<input type="hidden" name="id_tahun_ajaran" id="id_tahun_ajaran" value="<?php echo $informasi->id_tahun_ajaran ?>" class="form-control"/>
						                    			<button type="submit" class="btn btn-sm btn-info waves-effect"><i class="fa fa-check"></i> Bayar</button>
						                    		</form>
						                    		<?php }else{ ?>
						                    		<form method="POST" action="<?php echo base_url()?>Transaksi/hapus_spp">

						                    			<input type="hidden" name="id_spp" id="id_spp" value="<?php echo $data->id_spp ?>" class="form-control"/>
						                    			<button type="submit" class="btn btn-sm btn-danger waves-effect"><i class="fa fa-close"></i> Batal</button>
						                    		</form>
						                    		<?php } ?>
						                    		
						                    		
						                    	</td>
						                    	<td>
						                    		<?php if ($data->status=='Belum Lunas') {
						                    		?>
						                    		<button class="btn btn-sm btn-warning waves-effect" disabled><i class="fa fa-print"></i> Cetak</button>
						                    		<?php }else{ ?>
						                    		<a href="<?php echo base_url()?>Createpdf/cetak_spp/<?php echo $informasi->NIS?>/<?php echo $data->id_spp ?>" class="btn btn-sm btn-warning waves-effect" target="_blank" ><i class="fa fa-print"></i> Cetak</a>
						                    		<?php } ?>
						                    		
						                    	</td>
						                    </tr>
						                    <?php
						                	}
						                	?>

                                        </tbody>
                                    </table>
                                </div>
                        	</div>
                        </div>
                    </div>

                </div>
                <!-- End PAge Content -->
