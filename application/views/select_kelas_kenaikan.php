												
												<select name="id_kelas" class="form-control">
												<option value="">-- Pilih Kelas --</option>
                                                  <?php
                                                  foreach($kelas as $kel){
                                                  ?>
                                                  <option value="<?php echo $kel->id_kelas ?>"><?php echo $kel->kelas?></option>
                                                  <?php } ?>
                                                </select>