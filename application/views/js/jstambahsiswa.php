<script>
function hanyaAngka(evt) {
	var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
			return false;
			return true;
}
$("#tingkat").change(function(){
    var id_tingkat = {id_tingkat:$("#tingkat").val()};
    $.ajax({
        type: "POST",
        url : "<?php echo site_url('Siswa/ambil_kelas') ?>",
        data: id_tingkat,
        success: function(msg){
            $('#kelas').html(msg);
        }
    });
});
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