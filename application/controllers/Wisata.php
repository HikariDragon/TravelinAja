<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('wisata_model');
        $this->load->library('upload');
    }
    public function index()
	{
		$data['title'] = 'wisata';
        $data['wisata'] = $this->wisata_model->get_data('wisata')->result();
       
        $x['data']=$this->wisata_model->tampil_wisata();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('wisata', $x);
        $this->load->view('templates/footer');
	}

    function simpan_wisata(){
    	$config['upload_path'] = './uploads/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	        	$gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./uploads/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 756;
	            $config['height']= 434;
	            $config['new_image']= './uploads/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
                $nama_wisata=$this->input->post('nama_wisata');
                $deskripsi=$this->input->post('deskripsi');

				$this->wisata_model->SimpanWisata($nama_wisata,$deskripsi,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('wisata');
		}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('wisata');
	    }
	                 
	    }else{
			redirect('wisata');
		}
    }

    function update_wisata(){
	    $config['upload_path'] = './uploads/'; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

	    $this->upload->initialize($config);
	    if(!empty($_FILES['filefoto']['name'])){
	        if ($this->upload->do_upload('filefoto')){
	            $gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./uploads/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '60%';
	            $config['width']= 756;
	            $config['height']= 434;
	            $config['new_image']= './uploads/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
	            $kode=$this->input->post('kode');
                $nama_wisata=$this->input->post('nama_wisata');
                $deskripsi=$this->input->post('deskripsi');

				$this->wisata_model->update_wisata_with_img($kode,$nama_wisata,$deskripsi,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('wisata');
	                    
	    	}else{
	        	echo $this->session->set_flashdata('msg','warning');
	        	redirect('wisata'); 
	        }       
	    }else{
			$kode=$this->input->post('kode');
            $nama_wisata=$this->input->post('nama_wisata');
            $deskripsi=$this->input->post('deskripsi');
			$this->wisata_model->update_wisata_no_img($kode,$nama_wisata,$deskripsi);
			echo $this->session->set_flashdata('msg','info');
			redirect('wisata');
	    } 

	}

    function hapus_wisata(){
	    
	        $id=$this->input->post('kode');
	        $this->wisata_model->hapus_wisata($id);
	        $this->session->set_flashdata('msg','success-hapus');
	        redirect('wisata');
	    
    }

}