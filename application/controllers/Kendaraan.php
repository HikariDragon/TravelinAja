<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan extends CI_Controller {
    public function index()
    {
        $data['title'] = 'Kendaraan';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kendaraan');
        $this->load->view('templates/footer');

    }
}