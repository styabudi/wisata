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
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $wisata['nama'] ?></h5>
                    <p class="card-text"><?= $wisata['alamat'] ?></p>
                    <p class="card-text"><?= $wisata['harga'] ?></p>
                    <a href="#" class="btn btn-primary">Details</a>
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
                        <input type="text" class="form-control" id="formNama" name="nama" placeholder="Pantai Wisata">
                    </div>
                    <div class="mb-3">
                        <label for="formAlamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="formAlamat" name="alamat" placeholder="Jl. ...">
                    </div>
                    <div class="mb-3">
                        <label for="formEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="formEmail" name="email" placeholder="students@styabudiacademy.ac.id">
                    </div>
                    <div class="mb-3">
                        <label for="formJurusan" class="form-label">Jurusan</label>
                        <select class="form-select" aria-label="Default select example" name="jurusan">
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Teknik Informasi">Teknik Informasi</option>
                        </select>
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