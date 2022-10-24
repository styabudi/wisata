$(function () {
    var hargaTiket = 0;
    var pengunjungDewasa = 0;
    var pengunjungAnak = 0;
    var hargaTiketDewasa = 0;
    var hargaTiketAnak = 0;
    var totalHarga = 0;


    $('.tombolPesanTiket').on('click', function () {
        hargaTiket = 0;
        pengunjungDewasa = 0;
        pengunjungAnak = 0;
        hargaTiketDewasa = 0;
        hargaTiketAnak = 0;
        totalHarga = 0;
        $("#formPengunjungDewasa").val("");
        $("#formPengunjungAnak").val("");
        $('#formHargaTiket').val("Rp. 0");
        $('#formTotalBayar').val("Rp. " + totalHarga);
        $('#formHargaTiketInput').val("");
        $('#formTotalBayarInput').val("");

    });

    $('#formTempatWisata').on('change', function (e) {
        var valueSelected = this.value;
        if (valueSelected != 0) {
            $.ajax({
                url: baseUrl + '/wisata/getUpdate',
                data: { id: valueSelected },
                method: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#formHargaTiketInput').val(data.harga);
                    $('#formHargaTiket').val("Rp. " + data.harga);
                    hargaTiket = data.harga;
                    hitungTotalBayar();
                }
            });
        } else {
            $('#formHargaTiketInput').val("");
            $('#formHargaTiket').val("Rp. 0");
            hargaTiket = 0;
            hitungTotalBayar();
        }

    });
    $("#formPengunjungDewasa").keyup(function () {
        pengunjungDewasa = this.value;
        hitungTotalBayar();
    });

    $("#formPengunjungAnak").keyup(function () {
        pengunjungAnak = this.value;
        hitungTotalBayar();
    });
    

    $('#formCheckAgreement').change(function () {
        if(this.checked) {
            $('.btnSubmitBooking').prop("disabled", false);
        }else{
            $('.btnSubmitBooking').prop("disabled", true);
        }
    });

    function hitunghargaTiketDewasa() {
        hargaTiketDewasa = hargaTiket * pengunjungDewasa;
    }
    function hitungHargaTiketAnak() {
        hargaTiketAnak = (hargaTiket / 2) * pengunjungAnak;
    }

    function hitungTotalBayar() {
        hitungHargaTiketAnak();
        hitunghargaTiketDewasa();
        totalHarga = hargaTiketDewasa + hargaTiketAnak;
        $('#formTotalBayarInput').val(totalHarga);
        $('#formTotalBayar').val("Rp. " + totalHarga);
    }
});