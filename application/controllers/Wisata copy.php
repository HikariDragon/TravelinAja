<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class wisata extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('wisata_model');
    }

	public function index()
	{
		$data['title'] = 'wisata';
        $data['wisata'] = $this->wisata_model->get_data('tbl_wisata')->result();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('wisata', $data);
        $this->load->view('templates/footer');
	}
    public function tambah()
    {
        $data['title'] = 'wisata';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('tambah_wisata');
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah();
        } else {
            $data = array(
                'gambar' => $this->input->post('gambar'),
                'nama_wisata' => $this->input->post('nama_wisata'),
                'deskripsi' => $this->input->post('deskripsi'),
            );
            $config['upload_path']          = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload', $config);

            $this->wisata_model->insert_data($data, 'tbl_wisata');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Data Berhasi Ditambahkan!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> </div>');
            redirect('wisata');

        }
    }

    public function edit($id_wisata)
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->index(); 
        } else {
            $data = array(
                'id_wisata' => $id_wisata,
                'nama_wisata' => $this->input->post('nama_wisata'),
                'gambar' => $this->input->post('gambar'),
                'deskripsi' => $this->input->post('deskripsi'),
            );

            $this->wisata_model->update_data($data, 'tbl_wisata');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Diubah!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
             </button> </div>');
             redirect('wisata');
        }
        
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nama_wisata','Nama wisata','required', array(
            'required' => '%s harus diisi !'
        ));
        $this->form_validation->set_rules('gambar','gambar','required', array(
            'required' => '%s harus dipilih !'
        ));
    }
    public function delete($id)
    {
        $where = array('id_wisata' => $id);

        $this->wisata_model->delete($where, 'tbl_wisata');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        Data Berhasil Dihapus!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button> </div>');
         redirect('wisata');
    }
}