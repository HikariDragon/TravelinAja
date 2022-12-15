<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
   public function __construct()
{
    parent::__construct();
    $this->load->model(['customer_model', 'orders_model']);
    if(!$this->session->userdata('email')) {
        redirect('auth');
    }
}
   
   
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['customer'] = $this->customer_model->get_customer()->result();
        $data['orders'] = $this->orders_model->get_orders()->result_array();
       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');

    }
    
}

