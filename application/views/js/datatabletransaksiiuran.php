
<script>
function hanyaAngka(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
			return true;
}
function check_iuran()
{

	var id_tahun_ajaran	= $('#id_tahun_ajaran').val();
	var NIS = $('#NIS').val();

	//Ubah tulisan pada button saat click login
	$('#btnIuran').attr('value','Tunggu ..');
	if (NIS=='') {
		$('#btnIuran').attr('value','Coba Lagi ..');
		swal("NIS tidak Boleh Kosong");
	}else{
		//Gunakan jquery AJAX
	$.ajax({
		url		: "<?php echo base_url()?>Transaksiiuran/iuran",
		//mengirimkan username dan password ke script login.php
		data	: 'NIS='+NIS+'&id_tahun_ajaran='+id_tahun_ajaran, 
		//Method pengiriman
		type	: 'POST',
		//Data yang akan diambil dari script pemroses
		dataType: 'html',
		//Respon jika data berhasil dikirim
		success	: function(pesan){
			if(pesan=='tidak_ditemukan'){
				toastr.info('Siswa tidak ditemukan','Peringatan',{
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
				$('#btnIuran').attr('value','Coba lagi ...');
			}
			else{

				$("#iuran").load("Transaksiiuran/tampil/"+NIS+"/"+id_tahun_ajaran);
				$('#btnIuran').attr('value','Lihat');
			}
		},
	});
	}
	
	
}



function bayar_iuran()
{

	var NIS	= $('#ininis').val();
	var id_iuran = $('#iniidiuran').val();
	var jumlah_bayar = $('#inijumlahbayar').val();
	var id_tahun_ajaran = $('#iniidtahunajaran').val();
	//Ubah tulisan pada button saat click login
	$('#btnBayar').attr('value','Tunggu ..');
	if (NIS=='' || id_iuran=='' || inijumlahbayar =='') {
		$('#btnBayar').attr('value','Coba Lagi ..');
		swal("Inputan tidak Boleh Kosong");
	}else{
		//Gunakan jquery AJAX
	$.ajax({
		url		: "<?php echo base_url()?>Transaksiiuran/tambah",
		//mengirimkan username dan password ke script login.php
		data	: 'NIS='+NIS+'&id_iuran='+id_iuran+'&jumlah_bayar='+jumlah_bayar, 
		//Method pengiriman
		type	: 'POST',
		//Data yang akan diambil dari script pemroses
		dataType: 'html',
		//Respon jika data berhasil dikirim
		success	: function(pesan){
			if (pesan == 'lunas'){
				toastr.error('Siswa Sudah Melunasi iuran ini','Peringatan',{
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
				$('#btnBayar').attr('value','Coba lagi ...');
			}else{
				$("#iuran").load("Transaksiiuran/tampil/"+NIS+"/"+id_tahun_ajaran);
			$('#btnBayar').attr('value','Bayar');
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