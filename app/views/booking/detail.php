<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <img src="<?= BASEURL . '/img/' . $data['wisata']['gambar']; ?>" class="card-img-top img-fluid" alt="<?= $data['wisata']['nama'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $data['wisata']['nama'] ?></h5>
                <p class="card-text text-muted"><?= $data['wisata']['alamat'] ?></p>
                <?php if ($data['wisata']['video'] != null && $data['wisata']['video'] != null) {
                ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="ratio ratio-16x9">
                                <iframe src="<?= $data['wisata']['video'] ?>" title="YouTube video" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
                <p class="card-text"><?= $data['wisata']['catatan'] ?></p>
                <p class="card-text text-muted">Harga tiket : Rp. <?= $data['wisata']['harga'] ?></p>
                <div class="float-end">
                    <a href="<?= BASEURL; ?>/booking" class="btn btn-outline-primary">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>