<div class="row">
    div.col
    <div class="col-sm-12">
        <div class="card">
            <!-- <img src="..." class="card-img-top" alt="..."> -->
            <div class="card-body">
                <h5 class="card-title"><?= $data['wisata']['nama'] ?></h5>
                <p class="card-text"><?= $data['wisata']['alamat'] ?></p>
                <p class="card-text"><?= $data['wisata']['harga'] ?></p>
                <div class="float-end">
                    <a href="<?= BASEURL; ?>/wisata" class="btn btn-outline-primary">Kembali</a>
                </div>

            </div>
        </div>
    </div>
</div>