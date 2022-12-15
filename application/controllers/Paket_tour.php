<?php
class Paket_tour extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('paket_model');
        $this->load->library('upload');
		cek_login();
	}
    function index(){
	    
            $data['title'] = 'Paket';
            $data['paket'] = $this->paket_model->get_data('paket')->result();
		    $data['user']  = $this->db->get_where('user', ['email' =>
            $this->session->userdata('email')])->row_array();

	    	$x['data']=$this->paket_model->tampil_paket();
			$x['kat']=$this->paket_model->get_kategori();
	        $this->load->view('templates/header', $data);	
            $this->load->view('templates/sidebar', $data);
            $this->load->view('paket_tour',$x);	
            $this->load->view('templates/footer');
            
	   
    }

    function simpan_paket(){
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
                $nama_paket=$this->input->post('nama_paket');
				$kategori=$this->input->post('kategori');
				$deskripsi=$this->input->post('deskripsi');
				$hrg_dewasa=$this->input->post('hrg_dewasa');
				$hrg_anak=$this->input->post('hrg_anak');

				$this->paket_model->SimpanPaket($nama_paket,$kategori,$deskripsi,$hrg_dewasa,$hrg_anak,$gambar);
				echo $this->session->set_flashdata('msg','success');
				redirect('paket_tour');
		}else{
	        echo $this->session->set_flashdata('msg','warning');
	        redirect('paket_tour');
	    }
	                 
	    }else{
			redirect('paket_tour');
		}
    }

    function update_paket(){
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
                $nama_paket=$this->input->post('nama_paket');
				$kategori=$this->input->post('kategori');
				$deskripsi=$this->input->post('deskripsi');
				$hrg_dewasa=$this->input->post('hrg_dewasa');
				$hrg_anak=$this->input->post('hrg_anak');

				$this->paket_model->updatedenganimg($kode,$nama_paket,$kategori,$deskripsi,$hrg_dewasa,$hrg_anak,$gambar);
				echo $this->session->set_flashdata('msg','info');
				redirect('paket_tour');
	                    
	    	}else{
	        	echo $this->session->set_flashdata('msg','warning');
	        	redirect('paket_tour');
	        }       
	    }else{
			$kode=$this->input->post('kode');
            $nama_paket=$this->input->post('nama_paket');
			$kategori=$this->input->post('kategori');
			$deskripsi=$this->input->post('deskripsi');
			$hrg_dewasa=$this->input->post('hrg_dewasa');
			$hrg_anak=$this->input->post('hrg_anak');
			$this->paket_model->updatepaket($kode,$nama_paket,$kategori,$deskripsi,$hrg_dewasa,$hrg_anak);
			echo $this->session->set_flashdata('msg','info');
			redirect('paket_tour');
	    } 

	}

    function hapus_paket(){
	  
	        $id=$this->input->post('kode');
	        $this->paket_model->hapus_paket($id);
	        echo $this->session->set_flashdata('msg','success-hapus');
	        redirect('paket_tour');
	  
    }

}