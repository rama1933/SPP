

		<div class="card">
			<div class="card-body">

				<div class="table-responsive">
									<form>
										<i
									</form>
                                    <table id="myTable" class="table table-bordered">
                                        <thead>
                                            <tr>

                                                <th style="text-align: center">NIS</th>
                                                <th style="text-align: center">Nama</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<?php
                                        	foreach ($siswa as $data) {
                                        	?>
                                        	<tr>

                                        		<td style="text-align: center"><?php echo $data->NIS ?></td>
                                        		<td style="text-align: center"><?php echo $data->nama ?></td>

                                        	</tr>
                                        	<?php
                                        	}
                                        	?>
                                        </tbody>
                                    </table>
                                
                                </div>

			</div>
		</div>

