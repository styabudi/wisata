<?php

class WisataController extends Controller
{
    public function index()
    {
        // var_dump($this->helper('WisataHelper')->getScript());
        $data['title'] = 'Wisata';
        $data['page_title'] = 'Daftar Destinasi Wisata';
        $data['wisata'] = $this->model('WisataModel')->GetAllWisata();
        $data['scripts'] = $this->helper('WisataHelper')->getScript();
        $this->view('template/header', $data);
        $this->view('wisata/index',$data);
        $this->view('template/footer',$data);
    }
}
