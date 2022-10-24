<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <img src="<?= BASEURL . '/img/' . $data['wisata']['gambar']; ?>" class="card-img-top img-fluid" alt="<?= $data['wisata']['nama'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $data['wisata']['nama'] ?></h5>
                <p class="card-text text-muted"><?= $data['wisata']['alamat'] ?></p>
                <p class="card-text"><?= $data['wisata']['catatan'] ?></p>
                <p class="card-text text-muted">Harga tiket : Rp. <?= $data['wisata']['harga'] ?></p>
                <div class="float-end">
                    <a href="<?= BASEURL; ?>/booking" class="btn btn-outline-primary">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>