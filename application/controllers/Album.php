<?php
class Album extends CI_Controller{
	function __construct(){
        parent::__construct();
        $this->load->model('album_model');
        $this->load->library('upload');
        cek_login();
    }
    function index(){
       
        $data['title'] = 'album';
        $data['album'] = $this->album_model->get_data('album')->result();
		$data['user']  = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $x['data']=$this->album_model->tampil_album();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('album', $x);
        $this->load->view('templates/footer');
       
    }

    function simpan_album(){
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
                $config['height']= 350;
                $config['new_image']= './uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $jdl=$this->input->post('judul');

                $this->album_model->SimpanAlbum($jdl,$gambar);
                echo $this->session->set_flashdata('msg','success');
                redirect('album');
        }else{
            echo $this->session->set_flashdata('msg','warning');
            redirect('album');
        }
                     
        }else{
            redirect('album');
        }
    }

    function update_album(){
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
                $config['height']= 350;
                $config['new_image']= './uploads/'.$gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $gambar=$gbr['file_name'];
                $kode=$this->input->post('kode');
                $judul=$this->input->post('judul');

                $this->album_model->update_album_with_img($kode,$judul,$gambar);
                echo $this->session->set_flashdata('msg','info');
                redirect('album');
                        
            }else{
                echo $this->session->set_flashdata('msg','warning');
                redirect('album');
            }       
        }else{
            $kode=$this->input->post('kode');
            $judul=$this->input->post('judul');
            $this->album_model->update_album($kode,$judul);
            echo $this->session->set_flashdata('msg','info');
            redirect('album');
        } 

    }
    
    function hapus_album(){
        if($this->session->userdata('akses')=='1'){
            $id=$this->input->post('kode');
            $this->album_model->hapus_album($id);
            echo $this->session->set_flashdata('msg','success-hapus');
            redirect('album');
        }else{
            echo "Halaman tidak ditemukan";
        }
    }
    
	
}