<?php
class Mahasiswa extends Controller
{

    public function index()
    {
        $data['page_title'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }

    public function detail($id)
    {
        $data['page_title'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaById($id);
        $this->view('template/header', $data);
        $this->view('mahasiswa/detail', $data);
        $this->view('template/footer');
    }

    public function tambah()
    {
        // var_dump($_POST);
        if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
            Flasher::setFlash('Data Berhasil ditambahkan','','success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Data Gagal ditambahkan','','danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }
    public function hapus($id)
    {
        // var_dump($_POST);
        if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {
            Flasher::setFlash('Data Berhasil dihapus','','success');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }else{
            Flasher::setFlash('Data Gagal dihapus','','danger');
            header('Location: '.BASEURL.'/mahasiswa');
            exit;
        }
    }
}
