<div class="row">
    <div class="col-6">
        <?php Flasher::flash(); ?>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <button type="button" class="btn btn-primary mb-3 tombolTambahData" data-bs-toggle="modal" data-bs-target="#forModal">
            Tambah Data
        </button>
    </div>
</div>
<div class="row">

    <?php foreach ($data['wisata'] as $key => $wisata) : ?>
        <div class="col-sm-6 col-md-4 mb-3">
            <div class="card">
                <!-- <img src="..." class="card-img-top" alt="..."> -->
                <div class="card-body">
                    <h5 class="card-title"><?= $wisata['nama'] ?></h5>
                    <p class="card-text"><?= $wisata['alamat'] ?></p>
                    <p class="card-text"><?= $wisata['harga'] ?></p>
                    <div class="float-end">
                        <a href="<?= BASEURL; ?>/wisata/detail/<?= $wisata['id'] ?>" class="btn btn-outline-primary">Details</a>
                        <a href="<?= BASEURL; ?>/wisata/update" class="btn btn-outline-warning tampilModalUbah"  data-bs-toggle="modal" data-bs-target="#forModal" data-id="<?= $wisata['id'] ?>" >Update</a>
                        <a href="<?= BASEURL; ?>/wisata/delete/<?= $wisata['id'] ?>" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Delete</a>
                    </div>

                </div>
            </div>
        </div>
    <?php endforeach ?>
</div>

<div class="modal fade" id="forModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Wisata</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/wisata/add" method="post">
                    <div class="mb-3">
                        <label for="formNama" class="form-label">Nama Tempat Wisata</label>
                        <input type="hidden" name="id" id="formId">
                        <input type="text" class="form-control" id="formNama" name="nama" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="formAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="formAlamat" name="alamat" placeholder="">
                    </div>
                    <div class="mb-3">
                        <label for="formHarga" class="form-label">Harga Tiket</label>
                        <input type="number" class="form-control" id="formHarga" name="harga" placeholder="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>