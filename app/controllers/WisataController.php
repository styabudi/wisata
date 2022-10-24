<?php

class WisataController extends Controller
{
    public function index()
    {
        $data['title'] = 'Wisata';
        $data['page_title'] = 'Daftar Destinasi Wisata';
        $data['wisata'] = $this->model('WisataModel')->GetAllWisata();
        $data['scripts'] = $this->helper('WisataHelper')->getScript();
        $this->view('template/header', $data);
        $this->view('wisata/index',$data);
        $this->view('template/footer',$data);
    }

    public function add()
    {
        if ($this->model('WisataModel')->tambahData($_POST) > 0) {
            Flasher::setFlash('Data Berhasil ditambahkan', '', 'success');
            header('Location: ' . BASEURL . '/wisata');
            exit;
        } else {
            Flasher::setFlash('Data Gagal ditambahkan', '', 'danger');
            header('Location: ' . BASEURL . '/wisata');
            exit;
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Wisata';
        $data['page_title'] = 'Detail Destinasi Wisata';
        $data['wisata'] = $this->model('WisataModel')->GetWisataById($id);
        $this->view('template/header', $data);
        $this->view('wisata/detail', $data);
        $this->view('template/footer', $data);
    }

    public function getUpdate()
    {
        echo json_encode($this->model('WisataModel')->GetWisataById($_POST['id']));
    }

    public function update()
    {
        if ($this->model('WisataModel')->updateData($_POST) > 0) {
            Flasher::setFlash('Data Berhasil ditambahkan', '', 'success');
            header('Location: ' . BASEURL . '/wisata');
            exit;
        } else {
            Flasher::setFlash('Data Gagal ditambahkan', '', 'danger');
            header('Location: ' . BASEURL . '/wisata');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('WisataModel')->deleteWisata($id) > 0) {
            Flasher::setFlash('Data Berhasil dihapus', '', 'success');
            header('Location: ' . BASEURL . '/wisata');
            exit;
        } else {
            Flasher::setFlash('Data Gagal dihapus', '', 'danger');
            header('Location: ' . BASEURL . '/wisata');
            exit;
        }
    }
}
