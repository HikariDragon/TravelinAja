<?php
class Post extends CI_Controller{
	function __construct(){
		parent::__construct();		
        $this->load->model('berita_model');
        $this->load->library('upload');
		if(!$this->session->userdata('email')) {
			redirect('auth');
		}
	}

	function index(){
		
            $data['title'] = 'Post';
            $data['post'] = $this->berita_model->get_data('berita')->result();
            $data['user']  = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();
        
            $x['data']=$this->berita_model->tampil_berita();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
	        $this->load->view('post',$x);
            $this->load->view('templates/footer');    
            
        
	   
	    	
	}

	function get_edit(){
		$kode=$this->uri->segment(3);
		$x['data']=$this->berita_model->ambil_berita($kode);
		$this->load->view('edit_post',$x);
	}

	function simpan_post(){

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
	            $config['width']= 379;
	            $config['height']= 271;
	            $config['new_image']= './uploads/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
                $jdl=$this->input->post('judul');
                $berita=$this->input->post('berita');
                $user=$this->session->userdata('user');

				$this->berita_model->SimpanBerita($jdl,$berita,$gambar,$user);
				echo $this->session->set_flashdata('msg','success');
				redirect('post');
		}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('post');
	    }
	                 
	    }else{
			redirect('post');
		}
				
	}

	function update_post(){
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
	            $config['width']= 379;
	            $config['height']= 271;
	            $config['new_image']= './uploads/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $gambar=$gbr['file_name'];
	            $kode=$this->input->post('kode');
                $jdl=$this->input->post('judul');
                $berita=$this->input->post('berita');
                $user=$this->session->userdata('user');

				$this->berita_model->updateberitaimg($kode,$jdl,$berita,$gambar,$user);
				echo $this->session->set_flashdata('msg','info');
				redirect('post');
	                    
	    	}else{
	        	echo $this->session->set_flashdata('msg','warning');
	        	redirect('post');    
	        }       
	    }else{
			$kode=$this->input->post('kode');
        	$jdl=$this->input->post('judul');
        	$berita=$this->input->post('berita');
        	$user=$this->session->userdata('user');
			$this->berita_model->updateberita($kode,$jdl,$berita,$user);
			echo $this->session->set_flashdata('msg','info');
			redirect('post');
	    } 

	}

	function hapus_post(){
	    
	        $id=$this->input->post('kode');
	        $this->berita_model->hapus_berita($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('post');
	    
	    
    }

}