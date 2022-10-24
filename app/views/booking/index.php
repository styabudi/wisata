<div class="row">
    <div class="col-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-outline-success mb-3 tombolPesanTiket" data-bs-toggle="modal" data-bs-target="#forModal">
            Pesan Tiket Wisata
        </button>
    </div>
</div>
<div class="row">

    <?php foreach ($data['wisata'] as $key => $wisata) : ?>
        <div class="col-sm-6 col-md-4 mb-3">
            <div class="card">
                <img src="<?= BASEURL . '/img/' . $wisata['gambar']; ?>" class="card-img-top img-fluid" alt="<?= $wisata['nama'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $wisata['nama'] ?></h5>
                    <p class="card-text text-muted"><?= $wisata['alamat'] ?></p>
                    <p class="card-text"><?= $wisata['catatan'] ?></p>
                    <p class="card-text text-muted">Harga tiket : Rp. <?= $wisata['harga'] ?></p>
                    <div class="float-end">
                        <a href="<?= BASEURL; ?>/booking/detail/<?= $wisata['id'] ?>" class="btn btn-outline-primary">Details</a>
                        <a href="<?= BASEURL; ?>/wisata/update" class="btn btn-outline-success tampilModalBooking" data-bs-toggle="modal" data-bs-target="#forModal" data-id="<?= $wisata['id'] ?>">Express Booking</a>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="modal modal-lg fade" id="forModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Pesan Tiket Wisata</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/booking/bookTicket" method="post">
                    <div class="mb-2 row">
                        <label for="formNama" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formNama" name="nama">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formNik" class="col-sm-3 col-form-label">Nomor Identitas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formNik" name="nik">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formHp" class="col-sm-3 col-form-label">No. HP</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="formHp" name="hp">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="TempatWisata" class="col-sm-3 col-form-label">Tempat Wisata</label>
                        <div class="col-sm-9">
                            <select class="form-select" aria-label="Pilih tempat wisata" id="formTempatWisata" name="tempat_wisata">
                                <option value="0">Pilih tempat wisata</option>
                                <?php foreach ($data['wisata_dropdown'] as $key => $wisata_dropdown) : ?>
                                    <option value="<?= $wisata_dropdown['id']; ?>"><?= $wisata_dropdown['nama']; ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formTanggalKunjungan" class="col-sm-3 col-form-label">Tanggal Kunjungan</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="formTanggalKunjungan" name="tanggal_kunjungan">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formPengunjungDewasa" class="col-sm-3 col-form-label">Pengunjung Dewasa</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="formPengunjungDewasa" name="pengunjung_dewasa">
                        </div>
                    </div>
                    <div class="mb-2 row">
                        <label for="formPengunjungAnak" class="col-sm-3 col-form-label">Pengunjung Anak-anak <br><small>Usia Dibawah 12 tahun</small></label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="formPengunjungAnak" name="pengunjung_anak">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="formHargaTiket" class="col-sm-3 col-form-label">Harga Tiket</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="formHargaTiket" value="Rp. 0">
                            <input type="hidden" id="formHargaTiketInput" name="harga_tiket">
                        </div>
                    </div>
                    <div class="mb-5 row">
                        <label for="formTotalBayar" class="col-sm-3 col-form-label">Total Bayar</label>
                        <div class="col-sm-9">
                            <input type="text" readonly class="form-control-plaintext" id="formTotalBayar" value="Rp. 0">
                            <input type="hidden" id="formTotalBayarInput" name="total_harga">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="formCheckAgreement" name="check_agreement">
                                <label class="form-check-label" for="formCheckAgreement">
                                    Saya dan/atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan
                                </label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btnSubmitBooking" disabled>Booking</button>
                </form>
            </div>
        </div>
    </div>
</div>