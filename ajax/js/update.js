$(document).ready(function () {

    // nampilin data
    $(document).on('click', 'a[data-role=update]', function () {
        var id = $(this).data('id');
        var nim = $('#' + id).children('td[data-target=nim]').text();
        var nama = $('#' + id).children('td[data-target=nama]').text();
        var kelas = $('#' + id).children('td[data-target=kelas]').text();
        var nilai = $('#' + id).children('td[data-target=nilai]').text();

        $('#nim').val(nim);
        $('#nama').val(nama);
        $('#kelas').val(kelas);
        $('#nilai').val(nilai);
        $('#userId').val(id);
        $('#myModal2').modal('toggle');
    });

    // buat event untuk get data dan update ke database
    $('#save').click(function () {
        var id = $('#userId').val();
        var nim = $('#nim').val();
        var nama = $('#nama').val();
        var kelas = $('#kelas').val();
        var nilai = $('#nilai').val();

        $.ajax({
            url: 'ajax/update.php',
            method: 'post',
            data: {
                nim: nim,
                nama: nama,
                kelas: kelas,
                nilai: nilai,
                id: id
            },
            success: function (response) {

                $('#' + id).children('td[data-target=nim]').text(nim);
                $('#' + id).children('td[data-target=nama]').text(nama);
                $('#' + id).children('td[data-target=kelas]').text(kelas);
                $('#' + id).children('td[data-target=nilai]').text(nilai);
                $('#myModal2').modal('toggle');

            }
        });
    });
});