// tambah data biaya
$(document).ready(function () {
    $(".form-user2").submit(function () {
        var data = $('.form-user2').serialize();
        $.ajax({
            type: 'POST',
            url: "function/aksiTambahBiaya.php",
            data: data,
            success: function () {
                $(".row").load("ajax/tampilBiaya.php");
            }
        });
    });
});