$(function () {
    $('.tombolTambahData').on('click', function () {
        $('#judulModal').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
    });
    $('.tampilModalUbah').on('click', function () {
        $('#judulModal').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action','http://localhost/phpmvc/public/mahasiswa/ubah')
        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/phpmvc/public/mahasiswa/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#formId').val(data.id);
                $('#formNama').val(data.nama);
                $('#formNim').val(data.nim);
                $('#formJurusan').val(data.jurusan);
                $('#formEmail').val(data.email);
            }
        });
    });
});