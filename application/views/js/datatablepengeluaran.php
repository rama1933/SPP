    <script src="<?php echo base_url()?>assets/js/lib/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/datatables/datatables-init.js"></script>
    <script src="<?php echo base_url()?>jqueryuang/dist/jquery.maskMoney.min.js"></script>
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
                        "url": '<?php echo site_url('Pengeluaran/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        
                        {"data": "tgl_pengeluaran",'className' : 'text-center',width:100},
                        {"data": "keterangan",'className' : 'text-center',width:100},
                        {"data": "sejumlah",'className' : 'text-center',
                        render: function(toFormat){
                        return  'Rp. '+toFormat.toString().replace(
                        /\B(?=(\d{3})+(?!\d))/g, ".");}
                        ,width:100},
                        {"data": "action",'className' : 'text-center',width:100},
                    ],
 
                });
 
            });

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
        }
        function hapus(id_pengeluaran)
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
                                url : "<?php echo site_url('Pengeluaran/hapus')?>/"+id_pengeluaran,
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
            $(document).ready(function(){   
                $('#notifikasi').slideDown('slow').delay(3000).slideUp('slow');
            });
            function btntambah(){
                $('#ModalTambah').modal('show');
                $('#formtambah')[0].reset();
            }
            $(document).ready(function(){
                $('#formtambah').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo site_url('Pengeluaran/tambah') ?>",
                        dataType: "JSON",
                        data: $(this).serialize(),
                        'success': function(data){

                            $('#ModalTambah').modal('hide');
                            reload_table();


                        }
                    });
                });
            });

            function btnedit(id_pengeluaran)
            {
                $('#formedit')[0].reset();
                $.ajax({
                    url : "<?php echo site_url('Pengeluaran/edit')?>/" + id_pengeluaran,
                    type: "GET",
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('[name="id_pengeluaran"]').val(data.id_pengeluaran);
                        $('[name="keterangan"]').val(data.keterangan);
                        $('[name="sejumlah"]').val(data.sejumlah);
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
                        url: "<?php echo site_url('Pengeluaran/prosesedit') ?>",
                        dataType: "JSON",
                        data: $(this).serialize(),
                        'success': function(data){
                            $('#ModalEdit').modal('hide');
                            reload_table();

                        }
                    });
                });
            });
            $(document).ready(function(){
                $('#rupiah').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
                $('#rupiah2').maskMoney({prefix:'Rp. ', thousands:'.', decimal:',', precision:0});
            });
    </script>