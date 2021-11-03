
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
                        			<form>
                        				<div class="form-row">
                        					<div class="col-7" hidden>
										      <input type="text" name="id_tahun_ajaran" id="iniidtahunajaran" class="form-control" value="<?php echo $informasi->id_tahun_ajaran ?>" required>
										    </div>
                        					<div class="col-7" hidden>
										      <input type="text" name="NIS" id="ininis" class="form-control" value="<?php echo $informasi->NIS ?>" required>
										    </div>
										    <div class="col">
										      <select name="id_iuran" id="iniidiuran" class="form-control">
	                                                	<option value="">-- Pilih Jenis Iuran --</option>
	                                                	<?php foreach($bayar as $iuran){ ?>
	                                                	<option value="<?php echo $iuran->id_iuran ?>"><?php echo $iuran->jenis_iuran ?></option>
	                                                	<?php } ?>
	                                                </select>
										    </div>
										    <div class="col">
										      <input type="text" onkeypress="return hanyaAngka(event)" name="jumlah_bayar" id="inijumlahbayar" class="form-control" placeholder="Jumlah Bayar"  required>
										    </div>
										    <div class="col">
										      <input type="button" id="btnBayar" onclick="bayar_iuran();"  class="btn btn-info btn-flat form-control" value="Bayar">
										    </div>
                        					
                        				</div>
                        				
                        			</form>
                        			<br>
                        			<table class="table table-hover table-striped" >
                        				<thead>
                        					<thead>
                        						<tr>
	                        						<th style="text-align: center">#</th>
	                                                <th style="text-align: center">Jenis Iuran</th>
	                                                <th style="text-align: center">Sejumlah</th>
	                                                <th style="text-align: center">Status</th>
	                                                <th style="text-align: center">Cetak</th>
                        						</tr>
                        					</thead>
                        					<tbody>
                        						<?php
                        						$no=1;
                        						foreach($bayar as $iuran){
                        						?>
                    							<tr>
                    								<td style="text-align: center"><?php echo $no++ ?></td>
                    								<td style="text-align: center"><?php echo $iuran->jenis_iuran ?></td>
                    								<td style="text-align: center">Rp.<?php echo number_format($iuran->jumlah) ?></td>
                    								<td style="text-align: center">
                    									<?php 
                    									$query = $this->M_transaksiiuran->cek($informasi->NIS,$iuran->id_iuran);
                    									foreach($query->result_object() as $que){
                    										$sisa = $iuran->jumlah-$que->jumlah_bayar;
                    										if ($que->jumlah_bayar<>0) {
                    											if ($sisa == 0) {
                    												echo '<button class="btn btn-sm btn-primary waves-effect">Lunas</button>';
                    											}else{
                    												echo '<button class="btn btn-sm btn-success waves-effect">Sisa Pembayaran : Rp.'.number_format($sisa).'</button>';
                    											}
                    											
                    										}else{
                    											echo '<button class="btn btn-sm btn-danger waves-effect">Belum Bayar </button>';
                    										}
                    									}
                    									?>
                    								</td>
                    								<td style="text-align: center">
                    									<?php 
                    									$query = $this->M_transaksiiuran->cek($informasi->NIS,$iuran->id_iuran);
                    									foreach($query->result_object() as $que){
                    										$sisa = $iuran->jumlah-$que->jumlah_bayar;
                    										if ($que->jumlah_bayar<>0) {
                    											if ($sisa == 0) {
                    											?>

                    											<a href="<?php echo base_url()?>Createpdf/cetak_iuran/<?php echo $informasi->NIS ?>/<?php echo $iuran->id_iuran ?>" class="btn btn-sm btn-warning waves-effect" target="_blank" ><i class="fa fa-print"></i> Cetak</a>

                    											<?php
                    											}else{
                    											?><a href="<?php echo base_url()?>Createpdf/cetak_iuran/<?php echo $informasi->NIS ?>/<?php echo $iuran->id_iuran ?>" class="btn btn-sm btn-warning waves-effect" target="_blank" ><i class="fa fa-print"></i> Cetak</a>
                    											<?php
                    											}
                    											
                    										}else{
                    											echo '<button class="btn btn-sm btn-danger waves-effect">Belum Bayar </button>';
                    										}
                    									}
                    									?>
                    									
                    								</td>
                    							</tr>
                        						<?php } ?>
                        					</tbody>
                        				</thead>
                        			</table>
                        		</div>
                        	</div>
                        </div>
                    </div>

                   
                </div>
                <!-- End PAge Content -->
