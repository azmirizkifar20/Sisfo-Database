// tambah data mahasiswa
$(document).ready(function () {
    $(".form-user").submit(function () {
        var data = $('.form-user').serialize();
        $.ajax({
            type: 'POST',
            url: "function/aksiTambahMhs.php",
            data: data,
            success: function () {
                $(".row").load("ajax/tampilMhs.php");
            }
        });
    });
});