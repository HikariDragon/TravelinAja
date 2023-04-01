<?php
class Bank extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('bank_model');
        if(!$this->session->userdata('email')) {
            redirect('auth');
        }
    }

    function index(){
        $data['title'] = 'Bank';
        $data['bank'] = $this->bank_model->get_data('metode_bayar')->result();
		$data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $x['data']=$this->bank_model->tampil_bank();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bank',$x);
        $this->load->view('templates/footer');
    }

    function simpan_rekening(){
    	$norek=$this->input->post('norek');
    	$bank=$this->input->post('bank');
    	$atasnama=$this->input->post('atasnama');
    	$this->bank_model->simpan_rekening($norek,$bank,$atasnama);
    	echo $this->session->set_flashdata('msg','success');
    	redirect('bank');
    }

    function update_rekening(){
    	$kode=$this->input->post('kode');
    	$norek=$this->input->post('norek');
    	$bank=$this->input->post('bank');
    	$atasnama=$this->input->post('atasnama');
    	$this->bank_model->update_rekening($kode,$norek,$bank,$atasnama);
    	echo $this->session->set_flashdata('msg','info');
    	redirect('bank');
    }

    function hapus_rekening(){
    	$kode=$this->input->post('kode');
    	$this->bank_model->hapus_rekening($kode);
    	echo $this->session->set_flashdata('msg','success-hapus');
    	redirect('bank');
    }
}