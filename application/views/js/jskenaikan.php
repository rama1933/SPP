

<script>

$(document).ready(function() {
  $('#jurusan').change(function() { // Jika select box id kurir dipilih
       var id_jurusan = $(this).val(); // Ciptakan variabel kurir
       var id_tingkat = $('#tingkat').val(); // Ciptakan variabel kota
        $.ajax({
            type: 'POST', // Metode pengiriman data menggunakan POST
         	url: '<?php echo site_url()?>Kenaikan/ambil_kelas', // File pemroses data
           	data: 'id_tingkat=' + id_tingkat + '&id_jurusan=' + id_jurusan, // Data yang akan dikirim ke file pemroses yaitu ada 2 data
           success: function(response) { // Jika berhasil
              $('#kelas').html(response); // Berikan hasilnya ke id biaya
            }
       });
    });
  });


function tampil_siswa()
{

	var id_tingkat	= $('#tingkat').val();
	var id_jurusan = $('#jurusan').val();
	var id_kelas = $('#kelas').val();
	var id_tahun_ajaran = $('#tahun').val();
	var naik_tingkat = $('#naik_tingkat').val();

	//Ubah tulisan pada button saat click login
	$('#btnTampil').attr('value','Tunggu ..');
	if (id_tingkat=='' || id_kelas==''|| id_jurusan=='' || naik_tingkat=='') {
		$('#btnTampil').attr('value','Coba Lagi ..');
		swal("Inputan Tidak Boleh Kosong");
	}else{
		$.ajax({
		url		: "<?php echo base_url()?>Kenaikan/naik_tingkat",
		//mengirimkan username dan password ke script login.php
		data	: 'id_tingkat='+id_tingkat+'&id_jurusan='+id_jurusan+'&id_kelas='+id_kelas+'&id_tahun_ajaran='+id_tahun_ajaran+'&naik_tingkat='+naik_tingkat, 
		//Method pengiriman
		type	: 'POST',
		//Data yang akan diambil dari script pemroses
		dataType: 'html',
		//Respon jika data berhasil dikirim
		success	: function(pesan){
			if (pesan == 'berhasil') {
				toastr.success('Sukses menaikkan kelas','Berhasil',{
			        "positionClass": "toast-top-right",
			        timeOut: 5000,
			        "closeButton": true,
			        "debug": false,
			        "newestOnTop": true,
			        "progressBar": true,
			        "preventDuplicates": true,
			        "onclick": null,
			        "showDuration": "300",
			        "hideDuration": "1000",
			        "extendedTimeOut": "1000",
			        "showEasing": "swing",
			        "hideEasing": "linear",
			        "showMethod": "fadeIn",
			        "hideMethod": "fadeOut",
			        "tapToDismiss": false

			    })
				$('#btnTampil').attr('value','Tampilkan');
			}else{
				swal('Gagal Menaikkan kelas,terjadi kesalahan..')
			}
		},
	});
		
	}
	
	
}
$(document).ready(function() {
                $('#selecctall').click(function(event) {  //on click
                    if (this.checked) { // check select status
                        $('.checkbox1').each(function() { //loop through each checkbox
                            this.checked = true;  //select all checkboxes with class "checkbox1"              
                        });
                    } else {
                        $('.checkbox1').each(function() { //loop through each checkbox
                            this.checked = false; //deselect all checkboxes with class "checkbox1"                      
                        });
                    }
                });
   });

</script>