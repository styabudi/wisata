<div class="container mt-4">
    <div class="row">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h3>Daftar Mahasiswa</h3>

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#forModal">
                Tambah Data
            </button>

            <ul class="list-group">
                <?php foreach ($data['mhs'] as $key => $mhs) : ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <?= $mhs['nama'] ?>
                        <div>
                            <a href="<?= BASEURL; ?>/mahasiswa/detail/<?= $mhs['id']; ?>" class="badge text-bg-primary float-right">Detail</a>
                            <a href="<?= BASEURL; ?>/mahasiswa/hapus/<?= $mhs['id']; ?>" class="badge text-bg-danger float-right" onclick="return confirm('Apakah anda yakin ingin menghapus data ?')">Hapus</a>
                        </div>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="forModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Tambah Data Mahasiswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/mahasiswa/tambah" method="post">
                    <div class="mb-3">
                        <label for="formNama" class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" id="formNama" name="nama" placeholder="John Doe">
                    </div>
                    <div class="mb-3">
                        <label for="formNim" class="form-label">NIM</label>
                        <input type="number" class="form-control" id="formNim" name="nim" placeholder="123456">
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