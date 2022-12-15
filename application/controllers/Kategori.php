<?php
class Kategori extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
        cek_login();
    }
    function index()
    {


        $data['title'] = 'Kategori';
        $data['kategori'] = $this->kategori_model->get_data('kategori_paket')->result();
        $data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $x['data'] = $this->kategori_model->kategori();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('kategori', $x);
        $this->load->view('templates/footer');
    }
    function simpan_kategori()
    {
       
            $kategori = $this->input->post('kategori');
            $this->kategori_model->simpan_kategori($kategori);
            echo $this->session->set_flashdata('msg', 'success');
            redirect('kategori');
        
    }
    function update_kategori()
    {
        
            $id = $this->input->post('kode');
            $kategori = $this->input->post('kategori');
            $this->kategori_model->edit_kategori($id, $kategori);
            echo $this->session->set_flashdata('msg', 'info');
            redirect('kategori');
        
    }
    function hapus_kategori()
    {
      
            $id = $this->input->post('kode');
            $this->kategori_model->hapus_kategori($id);
            echo $this->session->set_flashdata('msg', 'success-hapus');
            redirect('kategori');
        
    }
}
