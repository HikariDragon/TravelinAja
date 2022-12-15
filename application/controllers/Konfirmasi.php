<?php
class Konfirmasi extends CI_Controller{
    function __construct(){
        parent::__construct();      
        $this->load->model('orders_model');
        cek_login();
    }
    function index(){
       
        $data['title'] = 'Konfirmasi';
        $data['konfirmasi'] = $this->orders_model->get_data('konfirmasi')->result();
		$data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
       
        $x['data']=$this->orders_model->get_pembayaran();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('konfirmasi',$x);
        $this->load->view('templates/footer');
    }
    function pembayaran_selesai(){
        $id=$this->input->post('kode');
        $this->orders_model->bayar_selesai($id);
        echo $this->session->set_flashdata('msg','success');
        redirect('orders');
    }
    function hapus_konfirmasi(){
        $kode=$this->input->post('kode');
        $this->orders_model->hapus_bayar($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('Konfirmasi');
    }
}
