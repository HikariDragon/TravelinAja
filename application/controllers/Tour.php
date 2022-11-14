<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tour extends CI_Controller {
    public function index()
    {
        $data['title'] = 'Tour';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tour');
        $this->load->view('templates/footer');

    }
}