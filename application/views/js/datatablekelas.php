    <script src="<?php echo base_url()?>assets/js/lib/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/datatables-init.js"></script>
    <script>
        var table;
          $(document).ready(function() {
                //datatables
                table = $('#datatable').DataTable({ 
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true,
                    "order": [],
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ], //Initial no order.
                    // Load data for the table's content from an Ajax source
                    "ajax": {
                        "url": '<?php echo site_url('Kelas/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "kelas",'className' : 'text-center',width:100},
                        {"data": "jurusan",'className' : 'text-center',width:100},
                        {"data": "tingkat",'className' : 'text-center',width:100},
                        {"data": "action",'className' : 'text-center',width:100},
                    ],
 
                });
 
            });

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
        }
        function hapus(id_kelas)
            {
                swal({
                    title: "Apa Kau Yakin?",
                    text: "Data yang sudah di hapus tidak bisa di kembalikan!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya!",
                    cancelButtonText: "Tidak!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                        if (isConfirm) {
                            // ajax delete data to database
                            $.ajax({
                                url : "<?php echo site_url('Kelas/hapus')?>/"+id_kelas,
                                type: "POST",
                                dataType: "JSON",
                                success: function(data)
                                {
                                    swal("Terhapus", "Data berhasil dihapus.", "success");
                                    reload_table();
                                },
                                error: function (jqXHR, textStatus, errorThrown)
                                {
                                    swal('ERROR','Terjadi Kesalahan', 'error');
                                }
                            });
                        } else {
                            swal("Dibatalkan", "Data tidak jadi dihapus", "error");
                        }
                });
            }
            function btnedit(id_kelas)
            {
                $('#formedit')[0].reset();
                $.ajax({
                    url : "<?php echo site_url('Kelas/edit')?>/" + id_kelas,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('[name="id_kelas"]').val(data.id_kelas);
                        $('[name="kelas"]').val(data.kelas);
                        $('[name="id_jurusan"]').val(data.id_jurusan).trigger('change');
                        $('[name="id_tingkat"]').val(data.id_tingkat).trigger('change');
                        $('#ModalEdit').modal('show');
                                        
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                        swal("Terjadi Kesalahan", "Silahkan coba lagi", "error");
                    }
                });
            }
            $(document).ready(function(){
                $('#formedit').submit(function(e){
                  
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Kelas/prosesedit') ?>",
                        dataType: "JSON",
                        data: $(this).serialize(),
                        'success': function(data){

                                $('#ModalEdit').modal('hide');
                                reload_table();

                        },
                        error: function (jqXHR, textStatus, errorThrown)
                        {
                            swal("Terjadi Kesalahan", "Gagal Mengubah Data", "error");
                        }
                    });
                });
            });
            function btntambah()
            {
                
                $('#ModalTambah').modal('show');
                $('#formtambah')[0].reset();
            }
            $(document).ready(function(){
	            $('#formtambah').submit(function(e){
	                e.preventDefault();
	                $.ajax({
	                    type: "POST",
	                    url: "<?php echo site_url('Kelas/tambah') ?>",
	                    dataType: "JSON",
	                    data: $(this).serialize(),
	                    'success': function(data){

                        $('#ModalTambah').modal('hide');
                        reload_table();

	                       
	                    }
	                });
	            });
	        });
    </script>