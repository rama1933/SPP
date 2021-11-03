                                                 

                                                  <select class="form-control" name="id_kelas" id="kelas" required>
                                                  <option value="">-- Pilih Kelas --</option>
                                                  <?php
                                                  foreach($kelas as $kel){
                                                  ?>
                                                  <option value="<?php echo $kel->id_kelas ?>"><?php echo $kel->kelas?> - <?php echo $kel->jurusan ?></option>
                                                  <?php } ?>
                                                </select>
