<?php
class Orders extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('orders_model');
        cek_login();
    }
    function index(){

        $data['title'] = 'Orders';
        $data['orders'] = $this->orders_model->get_data('orders')->result();
		$data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $x['data']=$this->orders_model->get_orders();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('orders',$x);
        $this->load->view('templates/footer');
        
    }
    function pembayaran_selesai($id){
        $id=$this->uri->segment(3);
        $this->orders_model->bayar_selesai($id);
        

        echo $this->session->set_flashdata('msg','success');
        redirect('orders');
    }
    function edit_orders(){
        $kode=$this->input->post('kode');
        $dewasa=$this->input->post('dewasa');
        $anaks=$this->input->post('anaks');
        $this->orders_model->edit_orders($kode,$dewasa,$anaks);
        echo $this->session->set_flashdata('msg','info');
        redirect('orders');
    }
    function hapus_order(){
        $kode=$this->input->post('kode');
        $this->orders_model->hapus_orders($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('orders');
    }
    public function print()
    {
        $data['orders'] = $this->orders_model->get_data('orders')->result();
        $this->load->view('print_orders', $data);
    }
}
