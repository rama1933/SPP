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
                        "url": '<?php echo site_url('Siswa/json'); ?>',
                        "type": "POST"
                    },
                    //Set column definition initialisation properties.
                    "columns": [
                        {"data": "NIS",'className' : 'text-center',width:100},
                        {"data": "nama",'className' : 'text-center',width:100},
                        {"data": "jurusan",'className' : 'text-center',width:100},
                        {"data": "kelas",'className' : 'text-center',width:100},
                        {"data": "action",'className' : 'text-center',width:100},
                    ],
 
                });
 
            });

        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax 
        }
        function hapus(id_siswa)
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
                                url : "<?php echo site_url('Siswa/hapus')?>/"+id_siswa,
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

            $("#fileUpload").on('change', function () {

                var imgPath = $(this)[0].value;
                var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();

                if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof (FileReader) != "undefined") {

                        var image_holder = $("#image-holder");
                        image_holder.empty();

                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $("<img />", {
                                "src": e.target.result,
                                    "class": "img-responsive thumbnail",
                                    "max-height":"100px",
                                    "max-width" : "200px"
                            }).appendTo(image_holder);

                        }
                        image_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        swal("Error","Browser anda tidak support file reader",'error');
                    }
                } else {
                    swal("Error","File bukan foto",'error');
                }
            });
            $(document).ready(function(){   
                $('#notifikasi').slideDown('slow').delay(3000).slideUp('slow');
            });
    </script>