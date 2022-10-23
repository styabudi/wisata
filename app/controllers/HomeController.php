<?php
class HomeController extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        $data['page_title'] = 'Selamat Datang di Wisataku';
        $data['scripts'] = [];
        $this->view('template/header', $data);
        $this->view('home/index', $data);
        $this->view('template/footer', $data);
    }
}
