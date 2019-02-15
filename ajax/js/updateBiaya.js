$(document).ready(function () {

    // nampilin data
    $(document).on('click', 'a[data-role=update]', function () {
        var id = $(this).data('id');
        var nim = $('#' + id).children('td[data-target=nim]').text();
        var nama = $('#' + id).children('td[data-target=nama]').text();
        var bpp = $('#' + id).children('td[data-target=bpp]').text();
        var asuransi = $('#' + id).children('td[data-target=asuransi]').text();
        var total = $('#' + id).children('td[data-target=total]').text();

        $('#nim').val(nim);
        $('#nama').val(nama);
        $('#bpp').val(bpp);
        $('#asuransi').val(asuransi);
        $('#total').val(total);
        $('#userId').val(id);
        $('#myModal2').modal('toggle');
    });

    // buat event untuk get data dan update ke database
    $('#save').click(function () {
        var id = $('#userId').val();
        var nim = $('#nim').val();
        var nama = $('#nama').val();
        var bpp = $('#bpp').val();
        var asuransi = $('#asuransi').val();

        var bppReplace = bpp.replace(/\./g, '');
        var asuransiReplace = asuransi.replace(/\./g, '');
        var bppParse = parseInt(bppReplace);
        var asuransiParse = parseInt(asuransiReplace);
        var jumlah = bppParse + asuransiParse;

        var pola = (/\B(?=(\d{3})+(?!\d))/g);
        var jumlahFix = jumlah.toString().replace(pola, ".");

        var total = jumlahFix;

        $.ajax({
            url: 'ajax/updateBiaya.php',
            method: 'post',
            data: {
                nim: nim,
                nama: nama,
                bpp: bpp,
                asuransi: asuransi,
                id: id
            },
            success: function (response) {
                $('#' + id).children('td[data-target=nim]').text(nim);
                $('#' + id).children('td[data-target=nama]').text(nama);
                $('#' + id).children('td[data-target=bpp]').text(bpp);
                $('#' + id).children('td[data-target=asuransi]').text(asuransi);
                $('#' + id).children('td[data-target=total]').text(total);
                $('#myModal2').modal('toggle');

            }
        });
    });
});