        <!-- Page wrapper  -->
        <div class="page-wrapper">

            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Siswa</h4>
                                <div id="notifikasi"><?php echo $this->session->flashdata('message'); ?></div>
                                <div class="table-responsive m-t-40">
                                    <a href="<?php echo base_url()?>Siswa/tambahsiswa" class="btn btn-success m-b-10 m-l-5">Tambah Siswa</a>
                                    <table id="datatable" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>NIS</th>
                                                <th>Nama</th>
                                                <th>Jurusan</th>
                                                <th>Kelas</th>
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

