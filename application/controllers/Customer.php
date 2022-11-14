<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
    }

	public function index()
	{
		$data['title'] = 'Customer';
        $data['customer'] = $this->customer_model->get_data('tbl_customer')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customer', $data);
        $this->load->view('templates/footer');
	}
    public function tambah()
    {
        $data['title'] = 'Customer';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('customer');
        $this->load->view('templates/footer');
    }
}