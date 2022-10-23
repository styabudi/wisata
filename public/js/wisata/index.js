
$(function () {
    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah Data Wisata');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Wisata');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', baseUrl + '/wisata/update')
        const id = $(this).data('id');

        $.ajax({
            url: baseUrl + '/wisata/getUpdate',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#formId').val(data.id);
                $('#formNama').val(data.nama);
                $('#formAlamat').val(data.alamat);
                $('#formHarga').val(data.harga);
            }
        });
    });
});