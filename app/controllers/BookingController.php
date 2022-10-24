<?php
class BookingController extends Controller
{
    public function index()
    {
        $data['title'] = 'Booking Tiket';
        $data['page_title'] = 'Pesan Tiket Kunjungan Wisata';
        $data['wisata'] = $this->model('WisataModel')->GetAllWisata();
        $data['scripts'] = $this->helper('BookingHelper')->getScript();
        $data['wisata_dropdown'] = $this->model('WisataModel')->GetAllWisataForDropdown();
        $this->view('template/header', $data);
        $this->view('booking/index', $data);
        $this->view('template/footer', $data);
    }
    
    public function detail($id)
    {
        $data['title'] = 'Booking Tiket';
        $data['page_title'] = 'Detail Destinasi Wisata';
        $data['wisata'] = $this->model('WisataModel')->GetWisataById($id);
        $this->view('template/header', $data);
        $this->view('booking/detail', $data);
        $this->view('template/footer', $data);
    }

    public function getWisataDetail()
    {
        echo json_encode($this->model('WisataModel')->GetWisataById($_POST['id']));
    }

    public function bookTicket()
    {
        if (trim($_POST['nik']) == '' || is_null(trim($_POST['nama']))) {
            Flasher::setFlash('Error, Nama lengkap tidak boleh kosong', '', 'danger');
            header('Location: ' . BASEURL . '/booking');
            exit;
        }

        if (trim($_POST['nik']) == '' || is_null(trim($_POST['nik']))) {

            var_dump(trim($_POST['nik']));
            Flasher::setFlash('Error, Nomor identitas tidak boleh kosong', '', 'danger');
            header('Location: ' . BASEURL . '/booking');
            exit;
        }

        if (trim($_POST['hp']) == '' || is_null(trim($_POST['hp']))) {

            Flasher::setFlash('Error, Nomor HP tidak boleh kosong', '', 'danger');
            header('Location: ' . BASEURL . '/booking');
            exit;
        }

        if (trim($_POST['tempat_wisata']) == '' || is_null(trim($_POST['tempat_wisata'])) || trim($_POST['tempat_wisata'] == 0)) {
            Flasher::setFlash('Error, Harus memilih tempat wisata', '', 'danger');
            header('Location: ' . BASEURL . '/booking');
            exit;
        }

        if (trim($_POST['tanggal_kunjungan']) == '' || is_null(trim($_POST['tanggal_kunjungan']))) {

            Flasher::setFlash('Error, Tanggal Kunjungan tidak boleh kosong', '', 'danger');
            header('Location: ' . BASEURL . '/booking');
            exit;
        }
        
        if (trim($_POST['pengunjung_dewasa']) == '' || is_null(trim($_POST['pengunjung_dewasa']))) {

            Flasher::setFlash('Error, Pengunjung dewasa tidak boleh kosong', '', 'danger');
            header('Location: ' . BASEURL . '/booking');
            exit;
        }
        

        if ($this->model('PemesananTiketModel')->saveBookingTiket($_POST) > 0) {
            Flasher::setFlash('Data Berhasil ditambahkan', '', 'success');
            header('Location: ' . BASEURL . '/booking');
            exit;
        } else {
            Flasher::setFlash('Data Gagal ditambahkan', '', 'danger');
            header('Location: ' . BASEURL . '/booking');
            exit;
        }
    }
}
