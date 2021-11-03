<script>
function hanyaAngka(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
			return true;
}
function check_siswa()
{

	var id_tahun_ajaran	= $('#id_tahun_ajaran').val();
	var NIS = $('#NIS').val();

	//Ubah tulisan pada button saat click login
	$('#btnSiswa').attr('value','Tunggu ..');
	if (NIS=='') {
		$('#btnSiswa').attr('value','Coba Lagi ..');
		swal("NIS tidak Boleh Kosong");
	}else{
		//Gunakan jquery AJAX
	$.ajax({
		url		: "<?php echo base_url()?>Transaksi/spp",
		//mengirimkan username dan password ke script login.php
		data	: 'NIS='+NIS+'&id_tahun_ajaran='+id_tahun_ajaran, 
		//Method pengiriman
		type	: 'POST',
		//Data yang akan diambil dari script pemroses
		dataType: 'html',
		//Respon jika data berhasil dikirim
		success	: function(pesan){
			if(pesan=='tidak_ditemukan'){
				toastr.error('Siswa tidak ditemukan','Peringatan',{
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
				$('#btnSiswa').attr('value','Coba lagi ...');
			}
			else{

				$("#spp").load("Transaksi/tampil/"+NIS+"/"+id_tahun_ajaran);
				$('#btnSiswa').attr('value','Lihat');
			}
		},
	});
	}
	
}

// $(document).ready(function(){
//     $("#tampil_spp").click(function(){
//     	var NIS 		= $("#NIS").val();
//     	var id_tahun_ajaran 		= $("#id_tahun_ajaran").val();
//     	if(NIS !== "" && id_tahun_ajaran !== ""){
//     		$("#spp").load("Transaksi/spp/"+NIS+"/"+id_tahun_ajaran);
//     	}else{
//     		alert('NIS tidak boleh kosong');
//     	}
        
//     });
// });
</script>