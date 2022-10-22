<?php

class About extends Controller
{
    public function index($nama = 'Siapa aja', $pekerjaan = 'pns')
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['page_title']='About';
        $this->view('template/header',$data);
        $this->view('about/index', $data);
        $this->view('template/footer');
    }
    public function page()
    {
        $data['page_title']='About';
        $this->view('template/header',$data);
        $this->view('about/page');
        $this->view('template/footer');
    }
}
