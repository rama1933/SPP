<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/images/favicon.png">
    <title>PANEL | LOGIN</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/lib/toastr/toastr.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:** -->
    <!--[if lt IE 9]>
    <script src="https:**oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https:**oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
			<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">

        <div class="unix-login">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="login-content card">
                            <div class="login-form">
                                <h4>LOGIN PANEL | SPP SMK</h4>
                                <form>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" id="txt_username" name="username" placeholder="Masukkan Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password" id="txt_password" placeholder="Masukkan Password">
                                    </div>
                                    <input type="button" id="btnLogin" onclick="check_login();"  class="btn btn-primary btn-flat m-b-30 m-t-30" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End Wrapper -->
    <!-- All Jquery -->
    <script src="<?php echo base_url()?>assets/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>assets/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="<?php echo base_url()?>assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/lib/toastr/toastr.min.js"></script>
    <!-- scripit init-->
    <script src="<?php echo base_url()?>assets/js/lib/toastr/toastr.init.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/js/scripts.js"></script>
<script>
function check_login()
{
	//Mengambil value dari input username & Password
	var username = $('#txt_username').val();
	var password = $('#txt_password').val();
	//Ubah alamat url berikut, sesuaikan dengan alamat script pada komputer anda
	var url_login	 = '<?php echo site_url()?>Login/proses_login';
	var url_home	 = '<?php echo site_url()?>Home';
	
	//Ubah tulisan pada button saat click login
	$('#btnLogin').attr('value','Silahkan tunggu ...');
	
	//Gunakan jquery AJAX
	$.ajax({
		url		: url_login,
		//mengirimkan username dan password ke script login.php
		data	: 'username='+username+'&password='+password, 
		//Method pengiriman
		type	: 'POST',
		//Data yang akan diambil dari script pemroses
		dataType: 'html',
		//Respon jika data berhasil dikirim
		success	: function(pesan){
			if(pesan=='ok'){
				//Arahkan ke halaman admin jika script pemroses mencetak kata ok
				window.location = url_home;
			}
			else{
				toastr.error('periksa username/password anda','Login Gagal',{
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
				$('#btnLogin').attr('value','Coba lagi ...');
			}
		},
	});
}
    </script>

</body>

</html>