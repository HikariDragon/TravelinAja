<?php
class Testimonial extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('testimoni_model');
        if(!$this->session->userdata('email')) {
            redirect('auth');
        }
    }
    function index(){
        $data['title'] = 'Testimoni';
        $data['testimonial'] = $this->testimoni_model->get_data('testimoni')->result();
        $data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        
        $x['data']=$this->testimoni_model->get_testimoni();
        $this->load->view('templates/header', $data);	
        $this->load->view('templates/sidebar', $data);
		$this->load->view('testimonial',$x);
        $this->load->view('templates/footer');
        
    }
    function publish(){
        $id=$this->uri->segment(4);
        $this->testimoni_model->publish($id);
        echo $this->session->set_flashdata('msg','info');
        redirect('testimonial');
    }
    
    function hapus_testimoni(){
        $kode=$this->input->post('kode');
        $this->testimoni_model->hapus_testimoni($kode);
        echo $this->session->set_flashdata('msg','success-hapus');
        redirect('testimonial');
    }
}
