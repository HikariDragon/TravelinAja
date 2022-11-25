<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('galeri_model');
    }
    public function index()
    {
        $data = array();

        $data['title'] = 'Galeri';
        $data['tbl_galeri'] = $this->galeri_model->getRows();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('galeri', $data);
        $this->load->view('templates/footer');
    
    }
    public function dragDropUpload(){
        if(!empty($_FILES)){
            $uploadPath = 'uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = '*';
            
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            if($this->upload->do_upload('galeri')){
                $fileData = $this->upload->data();
                $uploadData['nama_galeri'] = $fileData['nama_galeri'];
                $uploadData['tanggal'] = date("Y-m-d H:i:s");

                $insert = $this->galeri->insert($uploadData);
            }
        }
    }
}