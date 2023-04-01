<?php
class Inbox extends CI_Controller{
	function __construct()
    {
        parent::__construct(); 
		$this->load->model('kontak_model');
		if(!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	function index(){

        $data['title'] = 'Inbox';
        $data['inbox'] = $this->kontak_model->get_data('tbl_inbox')->result();
		$data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

		$this->kontak_model->update_status_kontak();
		$x['data']=$this->kontak_model->get_all_inbox();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
		$this->load->view('inbox',$x);
        $this->load->view('templates/footer');
	}

	function hapus_inbox(){
		$kode=$this->input->post('kode');
		$this->kontak_model->hapus_kontak($kode);
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('inbox');
	}
}