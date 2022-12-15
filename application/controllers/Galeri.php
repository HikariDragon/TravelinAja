<?php
class Galeri extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('galeri_model');
        $this->load->library('upload');
        cek_login();
    }
    public function index()
	{
		$data['title'] = 'Galeri';
        $data['galeri'] = $this->galeri_model->get_data('galeri')->result();
		$data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $x['data']=$this->galeri_model->tampil_galeri();
        $x['alm']=$this->galeri_model->get_album();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('galeri', $x);
        $this->load->view('templates/footer');
	}
    
    function simpan_galeri(){
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
                $config['width']= 400;
                $config['height']= 300;
                $config['new_image']= './uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $jdl=$this->input->post('judul');
                $album=$this->input->post('album');

                $this->galeri_model->SimpanGaleri($jdl,$album,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('galeri');
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('galeri');
        }
                     
        }else{
            redirect('galeri');
        }
    }

    function update_galeri(){
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
                $config['width']= 400;
                $config['height']= 300;
                $config['new_image']= './uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $jdl=$this->input->post('judul');
                $album=$this->input->post('album');

                $this->galeri_model->update_galeri_with_img($kode,$jdl,$album,$gambar);
                echo $this->session->set_flashdata('msg','info');
                redirect('galeri');
                        
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('galeri');
            }       
        }else{
            $kode=$this->input->post('kode');
            $jdl=$this->input->post('judul');
            $album=$this->input->post('album');
            $this->galeri_model->update_galeri($kode,$jdl,$album);
            echo $this->session->set_flashdata('msg','info');
            redirect('galeri');
        } 

    }

    function hapus_galeri(){
       
            $id=$this->input->post('kode');
            $this->galeri_model->hapus_photo($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('galeri');
       
        
    }
    
	
}